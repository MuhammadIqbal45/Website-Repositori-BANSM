<?php

namespace App\Imports;

use Illuminate\Support\Facades\Hash;
use App\User;
use Maatwebsite\Excel\Concerns\ToModel;

class UserImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'name' => $row[1],
            'email' => $row[2],
            'no_telfon' => $row[3],
            'alamat' => $row[4],
            'username' => $row[5],
            'level' => $row[6],
            // 'email_verified_at' => $row[7],
            'password' => Hash::make($row[7]),
            // 'remember_token' => $row[9],
        ]);
    }
}
