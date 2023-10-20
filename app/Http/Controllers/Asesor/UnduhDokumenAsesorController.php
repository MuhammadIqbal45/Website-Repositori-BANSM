<?php

namespace App\Http\Controllers\Asesor;

use App\dokumen;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnduhDokumenAsesorController extends Controller
{
    public function index()
    {
        $tambahdokumens = dokumen::orderBy('id', 'DESC')->paginate(4);
        return view('/asesor/unduh_dokumen', compact('tambahdokumens'));
        // return view('/klien/unduh_dokumen');
    }
}
