<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Support\Facades\Auth;
use App\kritik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KritikAsesorController extends Controller
{
    public function index()
    {
        $tambahkritiks = kritik::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(5);
        return view('/asesor/kritik_saran', compact('tambahkritiks'));
    }

    public function store(Request $request)
    {
        Kritik::create([
            'username' => Auth::user()->username,
            'kritik' => $request->kritik,
        ]);

        return redirect('asesor-kritik-dan-saran')->with('success', 'Data Berhasil Dikirim');
    }

    public function destroy($id)
    {
        $edt = kritik::findOrFail($id);
        $edt->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
