<?php

namespace App\Http\Controllers\Admin;

use App\visitasiPenginapan;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitasiPenginapanAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahvisitasis = visitasiPenginapan::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('total_biaya', 'LIKE', '%' . $request->search . '%')
                ->orwhere('waktu_masuk', 'LIKE', '%' . $request->search . '%')
                ->orwhere('waktu_keluar', 'LIKE', '%' . $request->search . '%')
                ->orwhere('penginapan', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahvisitasis = visitasiPenginapan::orderBy('id', 'DESC')->paginate(15);
        }

        return view('/admin/visitasi_penginapan', compact('tambahvisitasis'));
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
