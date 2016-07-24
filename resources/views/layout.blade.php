
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1, maximum-scale=1, minimal-ui"/>
	<title>Articles — Getting Simple</title>
	<link rel="shortcut icon" href="/favicon.png" type="image/png">
	<link rel="apple-touch-icon" sizes="144x144" href="/appicon.png">
	<link rel="stylesheet" type="text/css" href="/css/main.css">

	<!--TypeKit-->
	<script type="text/javascript" src="//use.typekit.net/fgm7qov.js"></script>
	<script type="text/javascript">try{Typekit.load();}catch(e){}</script>	
		
</head>

<body>

  <div class="[ o-band ]  [ u-border-bottom  u-no-padding-bottom ]">
    <div class="[ o-wrap  o-wrap--standard  o-wrap--portable-tiny ]">
	
	{!! Html::link("/".Config::get("writing.path"), "Home") !!}
</div></div>

@yield('content')

@yield('scripts')<!--
--></body>
</html>