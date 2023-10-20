<?php

namespace App\Imports;

use App\kelompokAsesor;
use Maatwebsite\Excel\Concerns\ToModel;

class KelompokAsesorImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new kelompokAsesor([
            'periode' => $row[1],
            'nama_kelompok' => $row[2],
            'user_id_sekolah' => $row[3],
            'user_username_sekolah' => $row[4],
            'user_email_sekolah' => $row[5],
            'user_no_telfon_sekolah' => $row[6],
            'user1_id' => $row[7],
            'user1_username' => $row[8],
            'user1_email' => $row[9],
            'user1_no_telfon' => $row[10],
            'user2_id' => $row[11],
            'user2_username' => $row[12],
            'user2_email' => $row[13],
            'user2_no_telfon' => $row[14],
        ]);
    }
}
