<?php

namespace Nonoesp\Folio\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Subscriber;
use Thinker;
use Mail;

class SubscriptionController extends Controller
{
  public function create(Request $request)
  {
    $email = $request->input('email');
    $name = $request->input('name');
    $source = $request->input('source');
    $medium = $request->input('medium');
    $campaign = $request->input('campaign');
    $path = $request->input('path');
    $ip = Thinker::clientIp();

    $subscriber = new Subscriber();
    $subscriber->email = $email;
    $subscriber->name = $name;
    $subscriber->source = $source;
    $subscriber->medium = $medium;
    $subscriber->campaign = $campaign;
    $subscriber->path = $path;
    $subscriber->ip = $ip;
    $subscriber->host = $request->root();
    $subscriber->save();

    $data = [];
    if($name = $subscriber->name) {
      array_push($data, $name);
    }
    if($source = $subscriber->source) {
      array_push($data, $source);
    }
    if($medium = $subscriber->medium) {
      array_push($data, $medium);
    }
    if($campaign = $subscriber->campaign) {
      array_push($data, $campaign);
    }
    if($ip = $subscriber->ip) {
      array_push($data, $ip);
    }

    if(config('folio.subscribers.should-notify')) {
      Mail::send('folio::email.new-subscriber',
      ['email' => $email, 'path' => $path, 'data' => $data],
      function ($m) use ($email) {
        $m->from(config('folio.subscribers.from.email'), config('folio.subscribers.from.name'));
        $m->to(config('folio.subscribers.to.email'), config('folio.subscribers.to.name'))->
            subject('New Subscriber to '.config('folio.title-short'));
      });
    }

    if(config('folio.should-add-to-mailchimp')) {
      \Newsletter::subscribeOrUpdate(
        $email, [
          // Here we need to reference the merge tags (e.g. 'NAME')
          // and pass a valid string (even if empty) for it to work
          //'NAME'=> $name,
          //'LASTNAME'=> $lastname,
          'IP' => $ip
          ]);
    }
    
    return response()->json([
        'success' => true,
        'email' => $subscriber->email,
        'name' => $subscriber->name,
        'source' => $subscriber->source,
        'medium' => $subscriber->medium,
        'campaign' => $subscriber->campaign,
        'path' => $subscriber->path,
        'host' => $subscriber->host,
    ]);
  }

  // Soft delete an existing subscriber
  public function delete(Request $request) {
    $id = $request->input('id');
    if($subscriber = Subscriber::find($id)) {
      $subscriber->delete();
    } else {
      // does not exist or is already deleted
    }
  }

  // Restore a soft-deleted subscriber
  public function restore(Request $request) {
    $id = $request->input('id');
    if($subscriber = Subscriber::onlyTrashed()->find($id)) {
      $subscriber->restore();
    } else {
      // does not exist or is already restored
    }
  }  
}
