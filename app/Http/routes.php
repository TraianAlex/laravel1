<?php

Route::controllers
([
	'home' => 'HomeController',
	'auth' => 'Auth\AuthController',
	'validated/user' => 'UserController',
	'validated/photos' => 'PhotoController',
	'validated/albums' => 'AlbumController',
	'/' => 'WelcomeController',
]);