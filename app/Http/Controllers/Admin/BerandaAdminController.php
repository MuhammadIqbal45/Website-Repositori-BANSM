<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaAdminController extends Controller
{
    public function index()
    {
        $count_users_admin = User::where('level', 'ADMIN')->select(User::raw('Count(id) as users'))->get();
        $count_users_asesor = User::where('level', 'ASESOR')->select(User::raw('Count(id) as users'))->get();
        $count_users_sekolah = User::where('level', 'SEKOLAH')->select(User::raw('Count(id) as users'))->get();
        $count_kelompok_asesors = DB::table('kelompok_asesors')->select(DB::raw('Count(id) as kelompok_asesors'))->get();


        $count_asesmen_dokumens = DB::table('asesmen_dokumens')->select(DB::raw('Count(id) as asesmen_dokumens'))->get();
        $count_visitasi_dokumens = DB::table('visitasi_dokumens')->select(DB::raw('Count(id) as visitasi_dokumens'))->get();
        $count_visitasi_perjalanans = DB::table('visitasi_perjalanans')->select(DB::raw('Count(id) as visitasi_perjalanans'))->get();
        $count_visitasi_penginapans = DB::table('visitasi_penginapans')->select(DB::raw('Count(id) as visitasi_penginapans'))->get();
        $count_validasi_dokumens = DB::table('validasi_dokumens')->select(DB::raw('Count(id) as validasi_dokumens'))->get();

        $count_ketersediaans = DB::table('ketersediaans')->select(DB::raw('Count(id) as ketersediaans'))->get();
        $count_pengumumen = DB::table('pengumumen')->select(DB::raw('Count(id) as pengumumen'))->get();
        $count_dokumens = DB::table('dokumens')->select(DB::raw('Count(id) as dokumens'))->get();
        $count_kritiks = DB::table('kritiks')->select(DB::raw('Count(id) as kritiks'))->get();
        return view('/admin/beranda', compact(['count_pengumumen', 'count_ketersediaans', 'count_kelompok_asesors', 'count_dokumens', 'count_visitasi_penginapans', 'count_users_admin', 'count_users_sekolah', 'count_users_asesor', 'count_asesmen_dokumens', 'count_visitasi_dokumens', 'count_visitasi_perjalanans', 'count_validasi_dokumens', 'count_kritiks']));
    }
}
