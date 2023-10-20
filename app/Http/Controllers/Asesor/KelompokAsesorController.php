<?php

namespace App\Http\Controllers\Asesor;

use App\kelompokAsesor;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KelompokAsesorController extends Controller
{
    public function index(Request $request)
    {
        $tambahkelompok = kelompokAsesor::where('kelompok_asesors.user1_username', Auth::user()->username)->orWhere('kelompok_asesors.user2_username', Auth::user()->username)->orderBy('id', 'DESC')->paginate(15);

        return view('/asesor/riwayat_kelompok_asesor', compact('tambahkelompok'));
    }
}
