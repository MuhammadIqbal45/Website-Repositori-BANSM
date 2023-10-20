<?php

namespace App\Http\Controllers\Asesor;

use App\asesmenDokumen;
use Illuminate\Support\Facades\DB;
use App\kelompokAsesor;
use Illuminate\Support\Facades\Auth;
use App\informasi;
use App\Http\Controllers\Controller;
use App\pengumuman;
use App\validasiDokumen;
use App\visitasiDokumen;
use App\visitasiPenginapan;
use App\visitasiPerjalanan;
use Illuminate\Http\Request;

class BerandaAsesorController extends Controller
{
    public function index()
    {
        $tambahperjalananvisitasis = visitasiPerjalanan::where('username', Auth::user()->username)->select(visitasiPerjalanan::raw('Count(username) as username'))->paginate();
        $tambahpenginapanvisitasis = visitasiPenginapan::where('username', Auth::user()->username)->select(visitasiPenginapan::raw('Count(username) as username'))->paginate();
        $tambahasesmens = asesmenDokumen::where('username', Auth::user()->username)->select(asesmenDokumen::raw('Count(username) as username'))->paginate();
        $tambahdokumenvisitasis = visitasiDokumen::where('username', Auth::user()->username)->select(visitasiDokumen::raw('Count(username) as username'))->paginate();
        $tambahvalidasis = validasiDokumen::where('username', Auth::user()->username)->select(validasiDokumen::raw('Count(username) as username'))->paginate();
        $tambahpengumumans = pengumuman::where('email', Auth::user()->email)->orderBy('id', 'DESC')->paginate(3);
        $tambahkelompok = kelompokAsesor::where('kelompok_asesors.user1_username', Auth::user()->username)->orWhere('kelompok_asesors.user2_username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(1);
        return view('/asesor/beranda', compact(['tambahkelompok', 'tambahpengumumans', 'tambahdokumenvisitasis', 'tambahvalidasis', 'tambahperjalananvisitasis', 'tambahpenginapanvisitasis', 'tambahasesmens']));
    }
}
