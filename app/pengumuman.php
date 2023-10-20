<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengumuman extends Model
{
    protected $table = 'pengumumen';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'email', 'subject', 'name', 'content', 'username', 'attachment', 'timestamps'];
}
