<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ketersediaan extends Model
{
    protected $table = 'ketersediaans';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'periode', 'tahun', 'file2', 'file', 'name', 'timestamps', 'username', 'email', 'no_telfon', 'alamat'];
}
