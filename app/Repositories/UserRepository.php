<?php


namespace App\Repositories;


use App\User;

class UserRepository extends BaseRepository
{
    public function getFieldsSearchable()
    {
        return [];
    }

    public function model()
    {
        return User::class;
    }
}
