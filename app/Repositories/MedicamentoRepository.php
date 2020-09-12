<?php


namespace App\Repositories;


use App\Medicamento;

class MedicamentoRepository extends BaseRepository
{
    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return Medicamento::class;
    }
}
