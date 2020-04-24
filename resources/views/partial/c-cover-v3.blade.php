<?php
    $cover_class = 'c-cover';
    $classes = $classes ?? ['--header'];
	$show_arrow = $show_arrow ?? false;
	$veil_opacity = $veil_opacity ?? null;
	$slideshow = $slideshow ?? null;
	$video = $video ?? null;
	$description = $description ?? null;
	$title = $title ?? null;
	$classes_title_b = $classes_title_b ?? null;
	$background_color = $background_color ?? null;
	$isLazy = $isLazy ??  null;
	$background_color = $background_color ??  null;
    $image = $image ??  null;
    $youtube = $youtube ?? null;
    
    // Expand modifier classes
	foreach($classes as $key => $class) {
		if (Str::of($class)->startsWith('--')) {
			$classes[$key] = $cover_class.$class;
		}
    }
    $classes_string = count($classes) ? '[ '.join(' ', $classes).' ]' : '';
?>

<section class="[ c-cover {{--
--}} @if($show_arrow) js--scroll-over @endif{{--
--}} ] {!! $classes_string !!}">

	@if($isLazy)
		<img class="[  lazy  ]" data-src="{!! $image !!}">
		<div class="[  lazy  ] [  c-cover__image  ]"></div>
	@else
		<div class="[ c-cover__image ]" style="
		@if($image) style="background-image:url('{!! $image !!}') @endif
		@if($background_color) style="background-color:{{ $background_color }} @endif
		"></div>
	@endif

	<div class="c-cover__fade"></div>

	<div class="c-cover__title">
		<span class="[ c-cover__title-a ]">{!! $title !!}</span>
		<br>
		<span class="[ c-cover__title-b  {!! $classes_title_b !!} ]">{!! $subtitle ?? '' !!}</span>
	</div>

	<div class="c-cover__description">
		{!! $description !!}
	</div>

	@if($show_arrow)
	<div class="[ c-cover__arrow-down ] [ js--arrow-down u-cursor-pointer ]">
		<div class="[ u-text-align--center ]">
			<svg class="[ o-icon o-icon--arrow-down ] [ js-arrow-down ]" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 54.59 29.43"><path d="M89.9,29.2"/><polygon points="27.3 28.3 0.76 2.19 2.16 0.76 27.3 25.5 52.43 0.76 53.84 2.19 27.3 28.3"/></svg>
		</div>
	</div>
	@endif

	@if($slideshow)
		<div class="[ c-cover__slide c-cover__slide-back c-cover__slide-back--js ]">
		</div>

		<div class="[ c-cover__slide c-cover__slide-front c-cover__slide-front--js ]">
		</div>
	@endif


	@if($video)

    <video class="c-cover__video" src="{!! $video !!}" preload="auto" autoplay loop muted>
			<source src="{!! $video !!}" type="video/mp4"/>
			Your browser does not support HTML5 video.
    </video>

	@endif

    @if($youtube)

    <style>
    .video-container {
        position: relative;
        padding-bottom: 56.25%; /* 16:9 */
        height: 0;
    }
    .video-container iframe {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }
    </style>
    
    <div class="video-container">
        <iframe width="560" height="315"
        src="https://www.youtube.com/embed/{{$youtube}}?controls=1&autoplay=1&showinfo=0&controls=0"
        frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
        allowfullscreen></iframe>
        </div>
    
    @endif

	<div class="[ c-cover__slide c-cover__veil c-cover__veil--js ]" @if($veil_opacity)style="opacity:{!! $veil_opacity !!}"@endif>
	</div>

</section>
