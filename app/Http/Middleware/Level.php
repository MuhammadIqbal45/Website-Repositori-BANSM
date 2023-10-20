<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Support\Facades\Redirect;

class Level
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$levels)
    {
        // // return $next($request);
        if (in_array($request->user()->level, $levels)) {
            return $next($request);
        }

        if (Auth::user()->level == 'ADMIN') {
            return Redirect::to('admin-beranda');
        } elseif (Auth::user()->level == 'ASESOR') {
            return Redirect::to('asesor-beranda');
        } elseif (Auth::user()->level == 'SEKOLAH') {
            return Redirect::to('sekolah-beranda');
        }
    }
}
