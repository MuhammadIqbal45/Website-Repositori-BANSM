<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GantiPasswordController extends Controller
{
    public function index_admin()
    {
        return view('/admin/ganti_password');
    }

    public function update_admin(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required'],
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return redirect('admin-ganti-password')->with('success', 'Password Berhasil Diganti');
        } else {
            return redirect('admin-ganti-password')->with('error', 'Password Tidak Berhasil Diganti');
        }
    }

    public function index_asesor()
    {
        return view('/asesor/ganti_password');
    }

    public function update_asesor(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required'],
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return redirect('asesor-ganti-password')->with('success', 'Password Berhasil Diganti');
        } else {
            return redirect('asesor-ganti-password')->with('error', 'Password Tidak Berhasil Diganti');
        }
    }

    public function index_sekolah()
    {
        return view('/sekolah/ganti_password');
    }

    public function update_sekolah(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'password' => ['required'],
        ]);

        if (Hash::check($request->current_password, auth()->user()->password)) {
            auth()->user()->update(['password' => Hash::make($request->password)]);
            return redirect('sekolah-ganti-password')->with('success', 'Password Berhasil Diganti');
        } else {
            return redirect('sekolah-ganti-password')->with('error', 'Password Tidak Berhasil Diganti');
        }
    }
}
