<?php

namespace App\Exports;

use App\kelompokAsesor;
use Maatwebsite\Excel\Concerns\FromCollection;

class KelompokAsesorExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return kelompokAsesor::all();
    }
}
