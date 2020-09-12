<?php

namespace App\Exports;

use App\Medicamento;
use Maatwebsite\Excel\Concerns\FromCollection;

class MedicamentosExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Medicamento::all();
    }
}
