<?php

namespace laravel1\Http\Controllers;

use Illuminate\Http\Request;

use laravel1\Http\Requests;
use laravel1\Http\Controllers\Controller;

use laravel1\Album;
use Auth;

class AlbumController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function getIndex()
	{
		$albums = Auth::user()->albums;//return 'Showing all the user albums';
		return view('albums.show', ['albums' => $albums]);
	}

	public function getCreateAlbum()
	{
		return 'showing the create album form';
		//return view('albums.create-album');
	}

	public function postCreateAlbum(CreateAlbumRequest $request)
	{
		return 'creating album';
		// $user = Auth::user();

		// $title = $request->get('title');
		// $description = $request->get('description');

		// Album::create
		// (
		// 	[
		// 		'title' => $title,
		// 		'description' => $description,
		// 		'user_id' => $user->id
		// 	]
		// );


		// return redirect('validated/albums/')->with(['album_created' => 'The Album has been created.']);
	}

	public function getEditAlbum($id)
	{
		return 'showing the edit album form';
		// $album = Album::find($id);
		// return view('albums.edit-album', ['album' => $album]);
	}

	public function postEditAlbum(EditAlbumRequest $request)
	{
		return 'editing album';
		// $album = Album::find($request->get('id'));
		
		// $album->title = $request->get('title');
		// $album->description = $request->get('description');

		// $album->save();

		// return redirect('validated/albums')->with(['edited' => 'The album has been edited']);
	}

	public function postDeleteAlbum(DeleteAlbumRequest $request)
	{
		return 'deleting the album';
		// $album = ALbum::find($request->get('id'));

		// $photos = $album->photos;

		// $controller = new PhotoController;

		// foreach ($photos as $photo)
		// {
		// 	$controller->deleteImage($photo->path);
		// 	$photo->delete();
		// }

		// $album->delete();

		// return redirect('validated/albums')->with(['deleted' => 'The album was deleted']);
	}

}
