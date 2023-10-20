<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitasiDokumen extends Model
{
    protected $table = 'visitasi_dokumens';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'npsn', 'berita_acara', 'surat_tugas', 'dokumen_individu', 'dokumen_kelompok', 'foto', 'timestamps', 'username'];
}
