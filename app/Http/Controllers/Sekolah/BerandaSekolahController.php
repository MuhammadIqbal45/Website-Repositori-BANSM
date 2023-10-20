<?php

namespace App\Http\Controllers\Sekolah;

use App\pengumuman;
use App\informasi;
use Illuminate\Support\Facades\Auth;
use App\kelompokAsesor;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerandaSekolahController extends Controller
{
    public function index()
    {
        $tambahpengumumans = pengumuman::where('email', Auth::user()->email)->orderBy('id', 'DESC')->paginate(3);
        // $tambahnotifikasis = informasi::where('email', Auth::user()->email)->orderBy('id', 'DESC')->paginate(3);
        $tambahkelompok = kelompokAsesor::where('kelompok_asesors.user1_username', Auth::user()->username)->orWhere('kelompok_asesors.user2_username', Auth::user()->username)->orWhere('kelompok_asesors.user_username_sekolah', Auth::user()->username)->orderBy('id', 'DESC')->paginate(1);
        return view('/sekolah/beranda', compact('tambahkelompok', 'tambahpengumumans'));
    }
}
