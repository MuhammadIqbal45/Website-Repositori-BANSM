<?php

namespace App\Http\Controllers\Asesor;

use Illuminate\Support\Facades\Auth;
use App\visitasiDokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitasiDokumenAsesorController extends Controller
{
    public function index()
    {
        $tambahdokumenvisitasis = visitasidokumen::where('username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(5);
        return view('/asesor/visitasi_dokumen', compact('tambahdokumenvisitasis'));
    }

    public function store(Request $request)
    {
        if ($request->dokumen_kelompok) {
            $request->validate([
                'npsn' => 'required',
                'username' => Auth::user()->username,
                'surat_tugas' => 'required',
                'dokumen_individu' => 'required',
                'dokumen_kelompok' => '',
                'foto' => 'required',
                'berita_acara' => 'required',
            ]);

            $filename = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->surat_tugas->getClientOriginalName();
            $request->surat_tugas->move(public_path() . '/dokumen/visitasi', $filename);

            $filename1 = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->dokumen_individu->getClientOriginalName();
            $request->dokumen_individu->move(public_path() . '/dokumen/visitasi', $filename1);

            $filename2 = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->dokumen_kelompok->getClientOriginalName();
            $request->dokumen_kelompok->move(public_path() . '/dokumen/visitasi', $filename2);

            $filename3 = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->foto->getClientOriginalName();
            $request->foto->move(public_path() . '/dokumen/visitasi', $filename3);

            $filename4 = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->berita_acara->getClientOriginalName();
            $request->berita_acara->move(public_path() . '/dokumen/visitasi', $filename4);

            $postData = [
                'npsn' => $request->npsn,
                'username' => Auth::user()->username,
                'surat_tugas' => $filename,
                'dokumen_individu' => $filename1,
                'dokumen_kelompok' => $filename2,
                'foto' => $filename3,
                'berita_acara' => $filename4,
            ];
        } else {
            $request->validate([
                'npsn' => 'required',
                'username' => Auth::user()->username,
                'surat_tugas' => 'required',
                'dokumen_individu' => 'required',
                'dokumen_kelompok' => '',
                'foto' => 'required',
                'berita_acara' => 'required',
            ]);

            $filename = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->surat_tugas->getClientOriginalName();
            $request->surat_tugas->move(public_path() . '/dokumen/visitasi', $filename);

            $filename1 = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->dokumen_individu->getClientOriginalName();
            $request->dokumen_individu->move(public_path() . '/dokumen/visitasi', $filename1);

            $filename3 = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->foto->getClientOriginalName();
            $request->foto->move(public_path() . '/dokumen/visitasi', $filename3);

            $filename4 = date('Ymd') . '_' . $request->npsn . "_" . Auth::user()->username . "_" . $request->berita_acara->getClientOriginalName();
            $request->berita_acara->move(public_path() . '/dokumen/visitasi', $filename4);

            $postData = [
                'npsn' => $request->npsn,
                'username' => Auth::user()->username,
                'surat_tugas' => $filename,
                'dokumen_individu' => $filename1,
                'foto' => $filename3,
                'berita_acara' => $filename4,
            ];
        }



        // $nm = $request->surat_tugas;
        // $nm1 = $request->dokumen_individu;
        // $nm2 = $request->dokumen_kelompok;
        // $nm3 = $request->foto;
        // $nm4 = $request->berita_acara;
        // $namaFile = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm->getClientOriginalName();
        // $namaFile1 = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm1->getClientOriginalName();
        // $namaFile2 = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm2->getClientOriginalName();
        // $namaFile3 = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm3->getClientOriginalName();
        // $namaFile4 = date('Ymd') . "_" . $request->npsn . "_" . Auth::user()->username . "_" . $nm4->getClientOriginalName();

        // $data = new visitasidokumen();
        // $data->username = Auth::user()->username;
        // $data->npsn = $request->npsn;
        // $data->surat_tugas = $namaFile;
        // $data->dokumen_individu = $namaFile1;
        // $data->dokumen_kelompok = $namaFile2;
        // $data->foto = $namaFile3;
        // $data->berita_acara = $namaFile4;

        // $nm->move(public_path() . '/dokumen/visitasi', $namaFile);
        // $nm1->move(public_path() . '/dokumen/visitasi', $namaFile1);
        // $nm2->move(public_path() . '/dokumen/visitasi', $namaFile2);
        // $nm3->move(public_path() . '/dokumen/visitasi', $namaFile3);
        // $nm4->move(public_path() . '/dokumen/visitasi', $namaFile4);
        // $data->save();

        visitasiDokumen::create($postData);
        return redirect('/asesor-laporan-visitasi')->with('success', 'Data Berhasil Ditambah');
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
