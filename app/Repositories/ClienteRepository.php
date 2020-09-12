<?php


namespace App\Repositories;


use App\Cliente;

class ClienteRepository extends BaseRepository
{
    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return Cliente::class;
    }
}
