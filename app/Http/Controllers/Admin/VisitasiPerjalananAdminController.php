<?php

namespace App\Http\Controllers\Admin;

use App\visitasiPerjalanan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitasiPerjalananAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahvisitasis = visitasiPerjalanan::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('total_biaya', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kendaraan', 'LIKE', '%' . $request->search . '%')
                ->orwhere('waktu_berangkat', 'LIKE', '%' . $request->search . '%')
                ->orwhere('waktu_tiba', 'LIKE', '%' . $request->search . '%')
                ->orwhere('lokasi_asal', 'LIKE', '%' . $request->search . '%')
                ->orwhere('lokasi_tujuan', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahvisitasis = visitasiPerjalanan::orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahvisitasis = visitasi::paginate(5);
        return view('/admin/visitasi_perjalanan', compact('tambahvisitasis'));
        // return view('/admin/visitasi');
    }

    public function destroy($id)
    {
        $edt = visitasiPerjalanan::findOrFail($id);
        $edt->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
