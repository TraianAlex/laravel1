<?php

namespace laravel1\Http\Middleware;

use Closure;
use laravel1\Album;

class ExistAlbumMiddleware
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
        $album = Album::find($id);
        if ($album == null) return redirect('/validated/albums');
        return $next($request);
    }
}
