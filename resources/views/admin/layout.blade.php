<?php
	$space_typekit = config('space.typekit');
	$space_css = config('space.css');
	if($space_typekit == '') $space_typekit = null;
	if($space_css == '') $space_css = null;
?>

<!DOCTYPE html>
<html lang="{{ Thinker::getLocaleDisplayed() }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimal-ui"/>
	<title>{{ $site_title or 'Admin' }}</title>
	<link rel="shortcut icon" href="/favicon.png" type="image/png">
	<link rel="apple-touch-icon" sizes="144x144" href="/appicon.png">
	<link rel="stylesheet" type="text/css" href="{{ $space_css or '/nonoesp/space/css/space.css?default' }}">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	@if($space_typekit)
	<!--TypeKit-->
	<script type="text/javascript" src="//use.typekit.net/{{ $space_typekit }}.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>
	@endif

</head>

<body>

	{{-- Header --}}
	<?php if(!isset($header_hidden)){ $header_hidden = config('space.admin-header.hidden'); } ?>
	<?php if(!isset($header_view)){ $header_view = config('space.admin-header.view'); } ?>
	<?php if(!isset($header_classes)){ $header_classes = config('space.admin-header.classes'); } ?>
	<?php if(!isset($header_data)){ $header_data = config('space.admin-header.data'); } ?>
	@if(!$header_hidden)
	{!! view($header_view)->with([
		'classes' => $header_classes,
		'data' => $header_data
	]) !!}
	@endif

  <div class="[ o-band ] [ u-pad-t-4x u-pad-b-4x ]">
    <div class="[ o-wrap o-wrap--size-small ]">

	@if(!isset($shouldHideMenu))
		{!! view('space::admin.c-menu') !!}
	@endif
	<div class="admin-title u-borderBottom">@yield('title', 'Admin')</div>

	@yield('content')

	</div>
</div>

{{--<script type="text/javascript" src="/js/vendor/jquery.min.js"></script>--}}<!--
-->@yield('scripts')<!--
--></body>
</html>
