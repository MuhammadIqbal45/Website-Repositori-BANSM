<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\visitasiPenginapan;
use Illuminate\Http\Request;

class VisitasiPenginapanAsesorController extends Controller
{
    public function index()
    {
        $tambahvisitasis = visitasiPenginapan::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(5);
        return view('/asesor/visitasi_penginapan', compact('tambahvisitasis'));
    }

    public function store(Request $request)
    {
        $data = new visitasiPenginapan();
        $data->username = Auth::user()->username;
        $data->waktu_masuk = $request->waktu_masuk;
        $data->waktu_keluar = $request->waktu_keluar;
        $data->penginapan = $request->penginapan;
        $data->total_biaya = $request->total_biaya;

        $data->save();

        return redirect('/asesor-laporan-penginapan-visitasi')->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $edt = visitasiPenginapan::findOrFail($id);
        $edt->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
