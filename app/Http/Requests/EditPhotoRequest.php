<?php

namespace laravel1\Http\Requests;

use laravel1\Http\Requests\Request;

use laravel1\Photo;
use laravel1\Album;
use Auth;

class EditPhotoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $id = $this->get('id');
        $photo = Photo::find($id);
        $album = Auth::user()->albums()->find($photo->album_id);
        return ($album) ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:photos,id',
            'title' => 'required',
            'description' => 'required',
            'image' => 'image|max:20000'
        ];
    }
}
