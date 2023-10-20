<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitasiPenginapan extends Model
{
    protected $table = 'visitasi_penginapans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'waktu_masuk', 'waktu_keluar', 'total_biaya', 'penginapan', 'timestamps', 'username'];
}
