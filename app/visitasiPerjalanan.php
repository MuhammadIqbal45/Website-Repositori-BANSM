<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class visitasiPerjalanan extends Model
{
    protected $table = 'visitasi_perjalanans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kendaraan', 'waktu_berangkat', 'waktu_tiba', 'total_biaya', 'lokasi_asal', 'lokasi_tujuan', 'timestamps', 'username'];
}
