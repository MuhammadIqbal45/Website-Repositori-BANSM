<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class informasi extends Model
{
    protected $table = 'informasis';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'email', 'subjek', 'informasi', 'file_dokumen', 'username', 'timestamps'];
}
