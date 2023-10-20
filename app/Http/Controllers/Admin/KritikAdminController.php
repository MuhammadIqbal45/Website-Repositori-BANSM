<?php

namespace App\Http\Controllers\Admin;

use App\kritik;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KritikAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahkritiks = kritik::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kritik', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahkritiks = kritik::orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahkritiks = kritik::paginate(5);
        return view('/admin/kritik_saran', compact('tambahkritiks'));
        // return view('/admin/kritik_saran');
    }

    public function destroy($id)
    {
        $edt = kritik::findOrFail($id);
        $edt->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
