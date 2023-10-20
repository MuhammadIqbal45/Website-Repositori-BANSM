<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class validasiDokumen extends Model
{
    protected $table = 'validasi_dokumens';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'npsn', 'dokumen_pakta', 'dokumen_berita_acara', 'status_rekomentasi', 'timestamps', 'username'];
}
