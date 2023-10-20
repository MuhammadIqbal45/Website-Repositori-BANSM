<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class kelompokAsesor extends Model
{
    protected $table = 'kelompok_asesors';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id', 'periode', 'nama_kelompok',
        'user_id_sekolah', 'user_username_sekolah', 'user_email_sekolah', 'user_no_telfon_sekolah',
        'user1_id', 'user1_username', 'user1_email', 'user1_no_telfon',
        'user2_id',  'user2_username',  'user2_email', 'user2_no_telfon',
        'timestamps'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
