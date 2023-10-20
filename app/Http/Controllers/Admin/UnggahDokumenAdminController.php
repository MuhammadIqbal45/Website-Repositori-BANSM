<?php

namespace App\Http\Controllers\Admin;

use App\dokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnggahDokumenAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahdokumens = dokumen::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('nama_dokumen', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahdokumens = dokumen::orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahdokumens = dokumen::paginate(5);
        return view('/admin/unggah_dokumen', compact('tambahdokumens'));
        // return view('/admin/unduh_dokumen');
    }

    public function store(Request $request)
    {
        $nm = $request->file_dokumen;
        $namaFile = $nm->getClientOriginalName();

        $data = new dokumen();
        $data->nama_dokumen = $request->nama_dokumen;
        $data->file_dokumen = $namaFile;

        $nm->move(public_path() . '/dokumen/unggah dokumen', $namaFile);
        $data->save();

        return redirect('/admin-unggah-dokumen')->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $hapus = dokumen::findOrFail($id);

        $file = public_path('/dokumen/unggah dokumen/') . $hapus->file_dokumen;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
