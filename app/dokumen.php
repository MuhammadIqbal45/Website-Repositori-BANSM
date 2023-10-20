<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class dokumen extends Model
{
    protected $table = 'dokumens';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'nama_dokumen', 'file_dokumen', 'timestamps'];
}
