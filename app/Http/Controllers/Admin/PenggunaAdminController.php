<?php

namespace App\Http\Controllers\Admin;

use App\Imports\UserImport;
use App\Exports\UserExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaAdminController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $tambahusers = User::where('id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('name', 'LIKE', '%' . $request->search . '%')
                ->orwhere('email', 'LIKE', '%' . $request->search . '%')
                ->orwhere('username', 'LIKE', '%' . $request->search . '%')
                ->orwhere('no_telfon', 'LIKE', '%' . $request->search . '%')
                ->orwhere('alamat', 'LIKE', '%' . $request->search . '%')
                ->orwhere('level', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahusers = User::orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahusers = User::paginate(5);
        return view('/admin/user', compact('tambahusers'));
    }

    public function show()
    {
        return view('/admin/tambah_user');
    }

    public function destroy($id)
    {
        $edt = User::findOrFail($id);
        $edt->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }

    public function simpanregistrasi(Request $request)
    {
        // dd($request->all());
        User::create([
            'name' => $request->name,
            'level' => $request->level,
            'username' => $request->username,
            'no_telfon' => $request->no_telfon,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('admin-pengguna')->with('success', 'Data Berhasil Dikirim');
    }

    public function edit()
    {
        return view('admin.akun')->with('user', auth()->user());
    }

    public function simpanperubahan(Request $request)
    {
        $user = auth()->user();
        $user->update([
            'name' => $request->name,
            'no_telfon' => $request->no_telfon,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect('admin-akun')->with('success', 'Data Berhasil Diubah');
    }

    public function userexport()
    {
        return Excel::download(new UserExport, 'users.xlsx');
    }

    public function userimport()
    {
        Excel::import(new UserImport, request()->file('file'));

        return back()->with('success', 'Data Berhasil Ditambah');
    }
}
