<?php

namespace App\Http\Controllers\Admin;

use App\Imports\KelompokAsesorImport;
use App\Exports\KelompokAsesorExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;
use App\kelompokAsesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelompokAsesorAdminController extends Controller
{
    public function index(Request $request)
    {
        $tambahuser = User::all();
        if ($request->has('search')) {
            $tambahkelompok = kelompokAsesor::where('kelompok_asesors.id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.periode', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.nama_kelompok', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user_id_sekolah', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user1_id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user2_id', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user_email_sekolah', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user1_email', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user2_email', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user_username_sekolah', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user1_username', 'LIKE', '%' . $request->search . '%')
                ->orwhere('kelompok_asesors.user2_username', 'LIKE', '%' . $request->search . '%')
                ->paginate(15);
        } else {
            $tambahkelompok = kelompokAsesor::with('user')->orderBy('id', 'DESC')->paginate(15);
        }

        // $tambahkelompok = kelompokAsesor::with('user')->paginate(5);
        return view('/admin/riwayat_kelompok_asesor', compact('tambahkelompok', 'tambahuser'));
        // return view('/admin/unduh_dokumen');
    }

    public function store(Request $request)
    {
        kelompokAsesor::create([
            'periode' => $request->periode,
            'nama_kelompok' => $request->nama_kelompok,
            'npsn' => $request->npsn,
            'nama_sekolah' => $request->nama_sekolah,
            'user1_id' => $request->user1_id,
            'user2_id' => $request->user2_id,
            'user1_email' => $request->user1_email,
            'user2_email' => $request->user2_email,
            'user1_username' => $request->user1_username,
            'user2_username' => $request->user2_username,
            // 'nama_kelompok' => $request->nama_kelompok,
        ]);

        return redirect('admin-riwayat-kelompok-asesor')->with('success', 'Data Berhasil Dikirim');
    }

    public function destroy($id)
    {
        $edt = kelompokAsesor::findOrFail($id);
        $edt->delete();
        return back()->with('success', 'Data Berhasil Dihapus');
    }

    // public function show(Request $request)
    // {
    //     $tambahuser = User::all();
    //     if ($request->has('search')) {
    //         $tambahkelompok = kelompokAsesor::join('users', 'users.id', '=', 'kelompok_asesors.user1_id', 'kelompok_asesors.user2_id', 'kelompok_asesors.user_id_sekolah')
    //             ->join('users', 'users.email', '=', 'kelompok_asesors.user1_email', 'kelompok_asesors.user2_email', 'kelompok_asesors.user_email_sekolah')
    //             ->join('users', 'users.username', '=', 'kelompok_asesors.user1_username', 'kelompok_asesors.user2_username', 'kelompok_asesors.user_username_sekolah')
    //             ->join('users', 'users.no_telfon', '=', 'kelompok_asesors.user1_no_telfon', 'kelompok_asesors.user2_no_telfon', 'kelompok_asesors.user_no_telfon_sekolah')
    //             ->where('id', 'LIKE', '%' . $request->search . '%')
    //             ->orwhere('periode', 'LIKE', '%' . $request->search . '%')
    //             ->orwhere('user1_id', 'LIKE', '%' . $request->search . '%')
    //             ->orwhere('user2_id', 'LIKE', '%' . $request->search . '%')
    //             ->orwhere('user1_email', 'LIKE', '%' . $request->search . '%')
    //             ->orwhere('user2_email', 'LIKE', '%' . $request->search . '%')
    //             ->orwhere('user1_username', 'LIKE', '%' . $request->search . '%')
    //             ->orwhere('user2_username', 'LIKE', '%' . $request->search . '%')
    //             ->paginate(15);
    //     } else {
    //         $tambahkelompok = kelompokAsesor::with('user')->paginate(15);
    //     }
    //     return view('/admin/tambah_riwayat_kelompok_asesor', compact('tambahkelompok', 'tambahuser'));
    // }

    public function kelompokasesorexport()
    {
        return Excel::download(new KelompokAsesorExport, 'kelompok_asesor.xlsx');
    }

    public function kelompokasesorimport()
    {
        Excel::import(new KelompokAsesorImport, request()->file('file'));

        return back()->with('success', 'Data Berhasil Ditambah');
    }
}
