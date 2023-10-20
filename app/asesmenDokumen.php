<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asesmenDokumen extends Model
{
    protected $table = 'asesmen_dokumens';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'npsn', 'dokumen_berita_acara', 'timestamps', 'username'];
}
