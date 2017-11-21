<?php

return [

	'path-prefix' => 'folio', // (1) 'string' site.com/string/slug, (2) '' site.com/slug
	'admin-path-prefix' => 'admin',

	'view' => [
		'layout' => 'folio::layout', // 'folio::layout'
		'collection' => 'template._base', // 'folio::base'
		'item' => 'template._standard', // 'folio::template._standard'
	],

	// Pattern of domains accepted by Folio (e.g. 'localhost|example.com|127.0.0.1')
	'domain-pattern' => 'yourdomain.com|localhost|127.0.0.1', 
	
	// Prefix for database tables
	'db-prefix' => 'folio_',

	// Wether subscribers should be added to Mailchimp (configuration on .env, using Spatie\Newsletter)
	'should-add-to-mailchimp' => false,

	'title' => 'Folio',
	'title-short' => 'Spc',
	'description' => 'A simple web.',
	'image_src' => 'http://domain.com/img/image_src.jpg',

	'css' => '/nonoesp/folio/css/folio.css', //

	'typekit' => '',
	'google-analytics' => '',

	'templates-path' => 'template', // search for custom templates at /resources/views/{value}

	'media-upload-path' => '/img/u/', // path where media is uploaded

	'uploader' => [
		'max_width' => 1500
	],

	'subscribers' => [
		'should-notify' => false,
		'from' => [
			'email' => 'from@domain.com',
			'name' => 'John Smith'
		],
		'to' => [
			'email' => 'to@domain.com',
			'name' => 'Alissa Smith'
		]
	],

	'cover' => [
		'title' => '',
		'subtitles' => ['Folio for Laravel','Making the web simple.'],
		'footline' => 'Folio for Laravel.'
	],

	'footer' => [
		'hide_credits' => false,
		'credits_text' => ''
		],

	//'template-paths' => ['folio::templates'],
	//'special-tags' => ['highlight'],

	'header' => [
			'title' => 'Folio',		
			'view' => 'folio::partial.c-header',
			'classes' => ['white', 'absolute'],
			'data' => []
		],

	'admin-header' => [
			'view' => 'folio::partial.c-header',
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

	'protected_uris' => ['example', 'profile', 'about', 'magic'], // are not overriden by folio

	'middlewares' => ['web'], // folio routes
	'middlewares-admin' => ['login', 'web'], // folio admin routes

	'published-show' => 5,
	'expected-show' => 100,

	'feed' => [
		'route' => 'feed.xml', // (e.g. 'feed', or 'feed.xml')
		'title' => 'Folio Feed',
		'description' => 'Folio publications.',
		'show' => '30', // maximum amount of articles to display
		'logo' => '', // (optional) URL to your feed's logo
		'default-image-src' => 'http://your-default.com/image.jpg',
		'default-author' => 'Nono Martínez Alonso'
	],

	'social' => [
		'twitter' => [
			'handle' => '@nonoesp'
		],
		'facebook' => [
			'app_id' => 'your-app-id',
			'author' => 'http://facebook.com/author-username',
			'publisher' => 'http://facebook.com/publisher-username',
		]
	]

];