<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\ketersediaan;
use Illuminate\Http\Request;

class KetersediaanAsesorController extends Controller
{
    public function index()
    {
        $tambahketersediaans = ketersediaan::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(5);
        return view('/asesor/ketersediaan', compact('tambahketersediaans'));
    }

    public function store(Request $request)
    {
        $nm = $request->file;
        $namaFile = date('Ymd') . "_" . Auth::user()->username . "_" . $nm->getClientOriginalName();

        $nm2 = $request->file2;
        $namaFile2 = date('Ymd') . "_" . Auth::user()->username . "_" . $nm2->getClientOriginalName();

        $data = new ketersediaan();
        $data->username = Auth::user()->username;
        $data->name = Auth::user()->name;
        $data->email = Auth::user()->email;
        $data->no_telfon = Auth::user()->no_telfon;
        $data->alamat = Auth::user()->alamat;
        $data->file = $namaFile;
        $data->file2 = $namaFile2;
        $data->tahun = $request->tahun;
        $data->periode = $request->periode;


        $nm->move(public_path() . '/dokumen/ketersediaan', $namaFile);
        $nm2->move(public_path() . '/dokumen/ketersediaan', $namaFile2);
        $data->save();

        return redirect('asesor-ketersediaan')->with('success', 'Data Berhasil Dikirim');
    }

    public function destroy($id)
    {
        $hapus = ketersediaan::findOrFail($id);

        $file = public_path('/dokumen/ketersediaan/') . $hapus->file;
        $file2 = public_path('/dokumen/ketersediaan/') . $hapus->file2;

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
