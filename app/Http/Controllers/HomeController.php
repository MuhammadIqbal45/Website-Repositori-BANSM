<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->level == 'ADMIN') {
            return redirect('/admin-beranda');
        } elseif (auth()->user()->level == 'ASESOR') {
            return redirect('/asesor-beranda');
        } elseif (auth()->user()->level == 'SEKOLAH') {
            return redirect('/sekolah-beranda');
        }
        return redirect('/login');
    }
}
