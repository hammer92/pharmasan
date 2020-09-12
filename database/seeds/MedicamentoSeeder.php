<?php

use Illuminate\Database\Seeder;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\MedicamentosImport;

class MedicamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            $csvFile = base_path() . '/database/csvs/medicamentos.csv';
            Excel::import(new MedicamentosImport, $csvFile);
        } catch (\Exception $e) {
            echo $e;
        }

    }
}
