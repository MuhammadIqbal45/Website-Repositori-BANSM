<?php

namespace App\Http\Controllers\Admin;

use App\visitasiDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitasiDokumenAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahdokumenvisitasis = visitasiDokumen::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('npsn', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahdokumenvisitasis = visitasiDokumen::orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahdokumenvisitasis = visitdokumen::paginate(5);
        return view('/admin/visitasi_dokumen', compact('tambahdokumenvisitasis'));
    }

    public function destroy($id)
    {
        $hapus = visitasiDokumen::findOrFail($id);

        $file = public_path('/dokumen/visitasi/') . $hapus->surat_tugas;
        $file1 = public_path('/dokumen/visitasi/') . $hapus->dokumen_individu;
        $file2 = public_path('/dokumen/visitasi/') . $hapus->dokumen_kelompok;
        $file3 = public_path('/dokumen/visitasi/') . $hapus->foto;
        $file4 = public_path('/dokumen/visitasi/') . $hapus->berita_acara;

        if (file_exists($file)) {
            @unlink($file);
        }
        $hapus->delete();

        if (file_exists($file1)) {
            @unlink($file1);
        }
        $hapus->delete();

        if (file_exists($file2)) {
            @unlink($file2);
        }
        $hapus->delete();

        if (file_exists($file3)) {
            @unlink($file3);
        }
        $hapus->delete();

        if (file_exists($file4)) {
            @unlink($file4);
        }
        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
