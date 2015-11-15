<?php

namespace laravel1\Http\Controllers;

use Illuminate\Http\Request;

use laravel1\Http\Requests;
use laravel1\Http\Controllers\Controller;

use laravel1\Http\Requests\EditProfileRequest;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getEditProfile()
	{
		return view('user.edit-profile');
	}

	public function postEditProfile(EditProfileRequest $request)
	{
		$user = Auth::user();

		$user->name = $request->get('name');

		if($request->has('password'))
		{
			$user->password = $request->get('password');//removed bcrypt and set attribute in model
		}

		if($request->has('question') || $request->has('answer'))
		{
			$user->question = $request->get('question');
			$user->answer = bcrypt($request->get('answer'));
		}

		$user->save();

		return redirect('/home')->with(['edited' => 'Your profile was succesfully edited']);
	}
}