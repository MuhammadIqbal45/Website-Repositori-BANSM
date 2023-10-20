<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Support\Facades\Auth;
use App\validasiDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidasiDokumenAsesorController extends Controller
{
    public function index()
    {
        $tambahvalidasis = validasiDokumen::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(5);
        return view('/asesor/validasi', compact('tambahvalidasis'));
    }

    public function store(Request $request)
    {
        $nm = $request->dokumen_pakta;
        $nm1 = $request->dokumen_berita_acara;
        $namaFile = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm->getClientOriginalName();
        $namaFile1 = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm1->getClientOriginalName();

        $data = new validasiDokumen();
        $data->username = Auth::user()->username;
        $data->npsn = $request->npsn;
        $data->status_rekomendasi = $request->status_rekomendasi;
        $data->dokumen_pakta = $namaFile;
        $data->dokumen_berita_acara = $namaFile1;

        $nm->move(public_path() . '/dokumen/validasi', $namaFile);
        $nm1->move(public_path() . '/dokumen/validasi', $namaFile1);
        $data->save();

        return redirect('/asesor-laporan-validasi')->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $hapus = validasiDokumen::findOrFail($id);

        $file = public_path('/dokumen/validasi/') . $hapus->dokumen_pakta;
        $file2 = public_path('/dokumen/validasi/') . $hapus->dokumen_berita_acara;

        if (file_exists($file)) {
            @unlink($file);
        }
        $hapus->delete();

        if (file_exists($file2)) {
            @unlink($file2);
        }
        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
