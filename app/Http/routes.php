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

// Route::get('/', function(){
// 	//print_r(app()->make('redis'));
// 	$redis = app()->make('redis');
// 	$redis->set("key1", "testValue");
// 	return $redis->get("key1");
// });

// Route::get('/', function(){
// 	$app = Redis::connection();
// 	$app->set('key2', 'value2');
// 	print_r($app->get('key2'));
// });

// Route::get('/', function(){
// 	Cache::forever('name', 'Dave');
// 	$name = Cache::get('name');
// 	print_r($name);
// });
