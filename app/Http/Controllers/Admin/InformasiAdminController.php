<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\User;
use App\informasi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InformasiAdminController extends Controller
{
    public function index(Request $request)
    {
        $tambahemail = User::all();
        if ($request->has('search')) {
            $tambahinformasis = informasi::join('users', 'users.email', '=', 'informasis.email')
                ->where('informasis.id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('informasis.email', 'LIKE', '%' . $request->search . '%')
                ->orwhere('informasis.subjek', 'LIKE', '%' . $request->search . '%')
                ->orwhere('informasis.informasi', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahinformasis = informasi::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahnotifikasis = notifikasi::paginate(5);
        return view('/admin/informasi', compact('tambahinformasis', 'tambahemail'));
    }

    public function store(Request $request)
    {
        // $nm = $request->file_dokumen;
        // $namaFile = $nm->getClientOriginalName();

        // $data = new informasi();
        // $data->email = $request->email;
        // $data->subjek = $request->subjek;
        // $data->informasi = $request->informasi;
        // $data->file_dokumen = $namaFile;

        // $nm->move(public_path() . '/dokumen/informasi', $namaFile);
        // $data->save();

        // return redirect('/admin-informasi')->with('success', 'Data Berhasil Ditambah');

        if ($request->file_dokumen) {
            $request->validate([
                'email' => 'required',
                'username' => Auth::user()->username,
                'subjek' => 'required',
                'informasi' => 'required',
                'file_dokumen' => 'mimes:pdf',
            ]);
            $filename = date('Ymd') . '_' . $request->file_dokumen->getClientOriginalName();
            $request->file_dokumen->move(public_path() . '/dokumen/informasi', $filename);

            $postData = [
                'email' => $request->email,
                'username' => Auth::user()->username,
                'subjek' => $request->subjek,
                'informasi' => $request->informasi,
                'file_dokumen' => $filename,
            ];
        } else {
            $postData = [
                'email' => $request->email,
                'username' => Auth::user()->username,
                'subjek' => $request->subjek,
                'informasi' => $request->informasi,
                'file_dokumen' => null,
            ];
        }

        informasi::create($postData);
        return redirect('/admin-informasi')->with('success', 'Data Berhasil Ditambah');
    }

    public function destroy($id)
    {
        $hapus = informasi::findOrFail($id);

        $file = public_path('/dokumen/informasi/') . $hapus->file_dokumen;

        if (file_exists($file)) {
            @unlink($file);
        }

        $hapus->delete();

        return back()->with('success', 'Data Berhasil Dihapus');
    }
}
