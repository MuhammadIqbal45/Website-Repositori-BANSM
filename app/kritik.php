<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class kritik extends Model
{
    protected $table = 'kritiks';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'kritik', 'timestamps', 'username'];
}
