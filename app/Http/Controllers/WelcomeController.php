<?php

namespace laravel1\Http\Controllers;
use laravel1\Album;

class WelcomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('guest');
	}
	/**
	 * Show the application welcome screen to the user.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		$photos = Album::find(383)->photos;
		return view('welcome', ['photos' => $photos]);
		//return view('welcome');
	}

}