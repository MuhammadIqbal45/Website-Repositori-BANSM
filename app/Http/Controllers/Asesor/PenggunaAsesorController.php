<?php

namespace App\Http\Controllers\Asesor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PenggunaAsesorController extends Controller
{
    public function edit()
    {
        return view('asesor.akun')->with('user', auth()->user());
    }

    public function simpanperubahan(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'no_telfon' => $request->no_telfon,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect('asesor-akun')->with('success', 'Data Berhasil Diubah');
    }
}
