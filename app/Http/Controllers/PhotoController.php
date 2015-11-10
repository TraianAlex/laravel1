<?php

namespace laravel1\Http\Controllers;

use Illuminate\Http\Request;

use laravel1\Http\Requests;
use laravel1\Http\Controllers\Controller;

use laravel1\Http\Requests\ShowPhotosRequest;

use laravel1\Album;
use laravel1\Photo;

class PhotoController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth');
	}

	public function getIndex(ShowPhotosRequest $request)//
	{
		$photos = Album::find($request->get('id'))->photos;//return 'showing all the album photo';

		return view('photos.show', ['photos' => $photos, 'id' => $request->get('id')]);
	}

	public function getCreatePhoto(Request $request)
	{
		return 'showing the create Photo from';
		// $id = $request->get('id');

		// return view('photos.create-photo', ['id' => $id]);
	}

	public function postCreatePhoto(CreatePhotoRequest $request)
	{
		return 'creating Photo';
		// $image = $request->file('image');
		// $id = $request->get('id');
		// Photo::create
		// (
		// 	[
		// 		'title' => $request->get('title'),
		// 		'description' => $request->get('description'),
		// 		'path' => $this->createImage($image),
		// 		'album_id' => $id
		// 	]
		// );
		// return redirect("validated/photos?id=$id")->with(['photo_created' => 'The photo has been created']);
	}

	public function getEditPhoto($id)
	{
		return 'showing the edit photo form';
		// $photo = Photo::find($id);
		// return view('photos.edit-photo', ['photo' => $photo]);
	}

	public function postEditPhoto(EditPhotoRequest $request)
	{
		return 'editing photo';
	// 	$photo = Photo::find($request->get('id'));

	// 	$photo->title = $request->get('title');
	// 	$photo->description = $request->get('description');

	// 	if($request->hasFile('image'))
	// 	{
	// 		$this->deleteImage($photo->path);

	// 		$image = $request->file('image');

	// 		$photo->path = $this->createImage($image);
	// 	}

	// 	$photo->save();

	// 	return redirect("validated/photos?id=$photo->album_id")->with(['edited' => 'The photo was edited']);
	// }

	// public function postDeletePhoto(DeletePhotoRequest $request)
	// {
	// 	$photo = Photo::find($request->get('id'));

	// 	$this->deleteImage($photo->path);

	// 	$photo->delete();

	// 	return redirect("validated/photos?id=$photo->album_id")->with(['deleted' => 'The photo was deleted']);
	}

	// public function createImage($image)
	// {
	// 	return '';
		// $path = '/img/';

		// $name = sha1(Carbon::now()).'.'.$image->guessExtension();

		// $image->move(getcwd().$path, $name);

		// return $path.$name;
	// }

	//public function deleteImage($oldpath)
	public function postDeletePhoto($oldpath)
	{
		return 'deleting photo';
		// $oldpath = getcwd().$oldpath;

		// unlink(realpath($oldpath));
	}

}
