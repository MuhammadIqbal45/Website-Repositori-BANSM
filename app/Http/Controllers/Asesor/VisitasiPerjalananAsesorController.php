<?php

namespace App\Http\Controllers\Asesor;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use App\visitasiPerjalanan;
use App\Http\Controllers\Controller;
use App\visitasiPenginapan;
use Illuminate\Http\Request;

class VisitasiPerjalananAsesorController extends Controller
{
    public function index()
    {
        $tambahvisitasis = visitasiPerjalanan::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(5);
        return view('/asesor/visitasi_perjalanan', compact('tambahvisitasis'));
    }

    public function store(Request $request)
    {
        $data = new visitasiPerjalanan();
        $data->username = Auth::user()->username;
        $data->waktu_berangkat = $request->waktu_berangkat;
        $data->waktu_tiba = $request->waktu_tiba;
        $data->lokasi_asal = $request->lokasi_asal;
        $data->lokasi_tujuan = $request->lokasi_tujuan;
        $data->total_biaya = $request->total_biaya;
        $data->kendaraan = $request->kendaraan;

        $data->save();

        return redirect('/asesor-laporan-perjalanan-visitasi')->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $edt = visitasiPerjalanan::findOrFail($id);
        $edt->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function exportPDF()
    {
        $perjalananvisitasis = visitasiPerjalanan::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(50);
        $penginapanvisitasis = visitasiPenginapan::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(50);
        $pdf = PDF::loadView('asesor/download_laporan', compact('perjalananvisitasis', 'penginapanvisitasis'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('perjalanan_visitasi.pdf');
    }
}
