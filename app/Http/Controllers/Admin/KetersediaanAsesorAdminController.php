<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\ketersediaan;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KetersediaanAsesorAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahketersediaans = ketersediaan::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('periode', 'LIKE', '%' . $request->search . '%')
                ->orwhere('tahun', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->orwhere('name', 'LIKE', '%' . $request->search . '%')
                ->orwhere('email', 'LIKE', '%' . $request->search . '%')
                ->orwhere('alamat', 'LIKE', '%' . $request->search . '%')
                ->orwhere('no_telfon', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahketersediaans = ketersediaan::orderBy('id', 'DESC')->paginate(15);
        }

        return view('/admin/ketersediaan', compact('tambahketersediaans'));
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
