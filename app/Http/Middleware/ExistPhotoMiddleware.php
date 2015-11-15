<?php

namespace laravel1\Http\Middleware;

use Closure;
use laravel1\Photo;

class ExistPhotoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id = $request->segment(4);
        $photo = Photo::find($id);
        if ($photo == null) return redirect('/validated/albums');
        return $next($request);
    }
}
