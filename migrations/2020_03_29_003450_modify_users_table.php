<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up() {

       Schema::table('users', function (Blueprint $table) {
              $table->softDeletes();
              $table->string('image')->nullable();
              $table->integer('is_admin')->nullable()->default(0);
              $table->string('twitter')->nullable();
              $table->string('twitter_image')->nullable();
       });

       $user = new User();
       $user->name = "Nono Martinez Alonso";
       $user->is_admin = 1;
       $user->email = "mail@domain.com";
       $user->password = Hash::make('p');
       $user->twitter = "nonoesp";
       $user->save();

     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
      Schema::table('users', function (Blueprint $table) {
        $table->dropSoftDeletes();
        $table->dropColumn('image');
        $table->dropColumn('is_admin');
        $table->dropColumn('twitter');
        $table->dropColumn('twitter_image');
      });

     }
 }
