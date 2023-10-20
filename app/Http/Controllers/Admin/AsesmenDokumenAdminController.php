<?php

namespace App\Http\Controllers\Admin;

use App\asesmenDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AsesmenDokumenAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahasesmens = asesmenDokumen::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('npsn', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahasesmens = asesmenDokumen::orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahasesmens = asesmen::paginate(5);
        return view('/admin/asesmen', compact('tambahasesmens'));
        // return view('/admin/asesmen');
    }

    public function destroy($id)
    {
        $hapus = asesmenDokumen::findOrFail($id);

        $file = public_path('/dokumen/asesmen/') . $hapus->dokumen_asesmen;
        $file1 = public_path('/dokumen/asesmen/') . $hapus->dokumen_berita_acara;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();

        if (file_exists($file1)) {
            @unlink($file1);
        }

        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
