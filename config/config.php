<?php

return [

	'path-prefix' => 'space', // (1) 'string' site.com/string/slug, (2) '' site.com/slug
	'admin-path-prefix' => 'admin',

	'view' => [
			'layout' => 'space::layout', 					// 'space::layout'
			'items' => 'space::template._base',		// 'space::base'
		],

	'db-prefix' => 'folio_',

	'title' => 'Space',
	'title-short' => 'Spc',
	'description' => 'A simple web.',
	'image_src' => 'http://domain.com/img/image_src.jpg',

	'css' => '/nonoesp/space/css/space.css', //

	'typekit' => '',
	'google-analytics' => '',

	'templates-path' => 'template', // search for custom templates at /resources/views/{value}

	'cover' => [
		'title' => '',
		'subtitles' => ['subtitle 01','subtitle 02'],
		'footline' => 'a simple web.'
	],

	'footer' => [
		'hide_credits' => false,
		'credits_text' => ''
		],

	//'template-paths' => ['space::templates'],
	//'special-tags' => ['highlight'],

	'header' => [
			'view' => 'space::partial.c-header',
			'classes' => ['white', 'absolute'],
			'data' => []
		],

	'admin-header' => [
			'view' => 'space::partial.c-header',
			'classes' => ['white', 'absolute'],
			'data' => []
		],

	'media_links' => [
    'rss' => '/feed.xml',
    'facebook' => 'http://facebook.com/nonoesp',
    'twitter' => 'http://twitter.com/nonoesp',
    'instagram' => 'http://instagram.com/nonoesp',
    'dribbble' => 'http://dribbble.com/nonoesp',
    'github' => 'http://github.com/nonoesp',
    'star' => 'http://gettingsimple.com'
	],

	'protected_uris' => ['example', 'profile', 'about', 'magic'], // are not overriden by space

	'middlewares' => ['web'], // space routes
	'middlewares-admin' => ['login', 'web'], // space admin routes

	'published-show' => 5,
	'expected-show' => 100,

	'feed' => [
		'route' => 'feed', // (e.g. 'feed', or 'feed.xml')
		'title' => 'My Space Feed',
		'description' => 'A description here would come handy.',
		'show' => '30', // maximum amount of articles to display
		'logo' => '', // (optional) URL to your feed's logo
		'default-image-src' => 'http://your-default.com/image.jpg',
		'default-author' => 'Nono Martínez Alonso'
	],

];
