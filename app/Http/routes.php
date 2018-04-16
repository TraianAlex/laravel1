<?php

use Illuminate\Support\Facades\Redis;
/*
    goredis
    redis-cli / GET  visits / INCR visits / DEL visits
 */
Route::get('test', function(){
    $visits = Redis::incr('visits');
    //$visits = Redis::incrBy('visits', 5);
    return view('test/redis')->withVisits($visits);
});
/*
    KEYS videos.*
 */
Route::get('test/{id}', function($id){
    $downloads = Redis::get("videos.{$id}.downloads");
    return view('test/redis')->withDownloads($downloads);
});
Route::get('test/{id}/download', function($id){
    //Prepare to download
    Redis::incr("videos.{$id}.downloads");
    return back();
});

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
