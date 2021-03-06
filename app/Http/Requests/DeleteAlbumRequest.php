<?php

namespace laravel1\Http\Requests;

use laravel1\Http\Requests\Request;

use Auth;
use laravel1\Album;

class DeleteAlbumRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $user = Auth::user();
        $id = $this->get('id');
        $album = $user->albums()->find($id);
        return $album ? true : false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'id' => 'required|exists:albums,id'
        ];
    }
}
