<?php

namespace laravel1\Http\Controllers;

use Illuminate\Http\Request;

use laravel1\Http\Requests;
use laravel1\Http\Controllers\Controller;

use laravel1\Album;
use Auth;
use laravel1\Http\Requests\CreateAlbumRequest;
use laravel1\Http\Requests\EditAlbumRequest;
use laravel1\Http\Requests\DeleteAlbumRequest;

class AlbumController extends Controller
{
    public function __construct()
    {
    	$this->middleware('auth');
    	$this->middleware('exist-album', ['only' => ['getEditAlbum']]);
    }

    public function getIndex()
	{
		$albums = Auth::user()->albums;
		return view('albums.show', ['albums' => $albums]);
	}

	public function getCreateAlbum()
	{
		return view('albums.create-album');
	}

	public function postCreateAlbum(CreateAlbumRequest $request)
	{
		Album::create(
			[
				'title' => $request->get('title'),
				'description' => $request->get('description'),
				'user_id' => auth()->user()->id
			]
		);

		return redirect('validated/albums/')->with(['album_created' => 'The Album has been created.']);
	}
	/**
	 * used middleware to chech if is exist in database or is null or use
	 * if(!$request->has('parameter')){return redirect('/validated/albums');}
	 * if(!isset($id))return redirect('/validated/albums'); with $id=null param
	 */
	public function getEditAlbum($id)
	{
		$album = Album::find($id);
		return view('albums.edit-album', ['album' => $album]);
	}

	public function postEditAlbum(EditAlbumRequest $request)
	{
		$album = Album::find($request->get('id'));
		$album->title = $request->get('title');
		$album->description = $request->get('description');
		$album->save();
		return redirect('validated/albums')->with(['edited' => 'The album has been edited']);
	}

	public function postDeleteAlbum(DeleteAlbumRequest $request)
	{
		$album = ALbum::find($request->get('id'));
		$photos = $album->photos;
		$controller = new PhotoController;

		foreach ($photos as $photo)
		{
			$controller->deleteImage($photo->path);
			$photo->delete();
		}
		$album->delete();
		return redirect('validated/albums')->with(['deleted' => 'The album was deleted']);
	}
}