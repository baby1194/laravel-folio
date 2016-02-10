<?php

return array(

	// Wrap all routes around a given path (i.e. writing/ or /blog)
	'use_path_prefix' => true,

	// Path without end/start slashes
	'path' => 'writing',

	// URIs protected from Writing routes
	'protected_uris' => ['example', 'profile', 'about', 'magic'],

	// Special tags (add a class to articles containing them)
	'special-tags' => ['case-study'],

	// Middlewares to filter provided routes
	'middlewares' => [],//['login']

	// Initial amount of articles to show in archive
	'archive-show' => 5,

	// Admin path prefix
	'admin_path' => 'admin',

	// RSS Feed configuration
	'feed' => array(
		'route' => 'feed.xml',
		'title' => 'My Untitled Feed',
		'description' => 'A description here would come handy.',
		'show' => '30', // maximum amount of articles to display
		'logo' => '', // (optional) URL to your feed's logo
		)
);