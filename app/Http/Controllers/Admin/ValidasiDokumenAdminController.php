<?php

namespace App\Http\Controllers\Admin;

use App\validasiDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ValidasiDokumenAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahvalidasis = validasiDokumen::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('npsn', 'LIKE', '%' . $request->search . '%')
                ->orwhere('status_rekomendasi', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahvalidasis = validasiDokumen::orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahvalidasis = validasi::paginate(5);
        return view('/admin/validasi', compact('tambahvalidasis'));
        // return view('/admin/validasi');
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
