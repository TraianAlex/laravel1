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
		return view('user.edit-profile');//return 'Showing the edit profile form';
	}

	public function postEditProfile(EditProfileRequest $request)
	{
		//return 'Changing the profile';
		$user = Auth::user();

		$user->name = $request->get('name');

		if($request->has('password'))
		{
			$user->password = bcrypt($request->get('password'));
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
