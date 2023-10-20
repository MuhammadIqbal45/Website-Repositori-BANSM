<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('username', 'password'))) {
            if (auth()->user()->level == 'ADMIN') {
                return redirect('/admin-beranda')->with('success', 'Berhasil Login');
            } elseif (auth()->user()->level == 'ASESOR') {
                return redirect('/asesor-beranda')->with('success', 'Berhasil Login');
            } elseif (auth()->user()->level == 'SEKOLAH') {
                return redirect('/sekolah-beranda')->with('success', 'Berhasil Login');
            }
        }
        return redirect('/login')->with('error', 'Login Tidak Berhasil');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        // request()->session()->invalidate();

        // request()->session()->regenerateToken();

        return redirect('/login')->with('success', 'Berhasil Logout');
    }
}
