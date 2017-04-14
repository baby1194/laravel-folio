
@extends('space::admin.layout')

<?php
$settings_title = Config::get('space.title');
if($settings_title == '') {
	$settings_title = "Space";
}
	$site_title = 'Subscribers | '. $settings_title;
?>

@section('title', 'Subscribers')

@section('scripts')
    <script type="text/javascript" src="/nonoesp/space/js/space.js"></script>
@stop

@section('content')

<style media="screen">
	.grid {
		letter-spacing: inherit;
	}
</style>

<div class="c-admin">

  @if(count($subscribers))

    @if(count($subscribers) == 1)
      <p>There is a subscriber.</p>
    @else
      <p>There are {{ count($subscribers) }} subscribers.</p>
    @endif

		<ul class="c-archive__list">
			@foreach($subscribers as $subscriber)

				<?php
					$date = new Date($subscriber->created_at);
					//$date = ucWords(substr($date->format('F'), 0, 3).'&nbsp;'.$date->format('j').'&nbsp;'.$date->format('Y'));
					$date = ucWords(substr($date->format('l'), 0, 3)
							 .'&nbsp;'
							 .$date->format('j')
							 .',&nbsp;'
							 .substr($date->format('F'), 0, 3)
							 .'&nbsp;'
							 .$date->format('Y'));
					?>

					<li>
						<a href="mailto:{{ $subscriber->email }}" target="_blank">
							<b class="c-archive__list__title">{{ $subscriber->email }}</b>
							<em class="c-archive__list__date">{{ $date }}</em>
						</a>
						<p class="c-archive__list__date u-font-size--a u-opacity--half" style="margin-top:-0.8em">
							@if($path = $subscriber->path)
								{{ $path }}
							@endif
							@if($source = $subscriber->source)
								· Source: {{ $source }}
							@endif
							@if($campaign = $subscriber->campaign)
								· Campaign: {{ $campaign }}
							@endif
						</p>
					</li>

			@endforeach
		</ul>

  @else
    <p>
      There are no subscribers yet.
    </p>
  @endif

</div>

@endsection
