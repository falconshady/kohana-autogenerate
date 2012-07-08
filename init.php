<?php

// Static file serving (CSS, JS, images)
Route::set('autogenerate', '<directory>(/<controller>(/<action>(/<id>)))', array(
		'directory' => '(autogenerate)'
	))
	->defaults(array(
		'controller' => 'main',
		'action'     => 'index'
	));