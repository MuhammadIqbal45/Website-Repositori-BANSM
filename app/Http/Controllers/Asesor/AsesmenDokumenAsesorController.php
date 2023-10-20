<?php

namespace App\Http\Controllers\Asesor;

use App\User;
use Illuminate\Support\Facades\Auth;
use App\asesmenDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsesmenDokumenAsesorController extends Controller
{
    public function index()
    {
        $tambahasesmens = asesmenDokumen::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(5);
        return view('/asesor/asesmen', compact('tambahasesmens'));
    }

    public function store(Request $request)
    {
        $nm1 = $request->dokumen_berita_acara;
        $namaFile1 = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm1->getClientOriginalName();

        $data = new asesmenDokumen();
        $data->username = Auth::user()->username;
        $data->npsn = $request->npsn;
        $data->dokumen_berita_acara = $namaFile1;

        $nm1->move(public_path() . '/dokumen/asesmen', $namaFile1);
        $data->save();

        return redirect('/asesor-laporan-asesmen')->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $hapus = asesmenDokumen::findOrFail($id);

        $file1 = public_path('/dokumen/asesmen/') . $hapus->dokumen_berita_acara;

        if (file_exists($file1)) {
            @unlink($file1);
        }

        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
