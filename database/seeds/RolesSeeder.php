<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [ 'nombre' => 'administrador'],
            [ 'nombre' => 'vendedor'],
        ]);
        \App\Roles::find(1)->permisos()->sync([1,2,3,4,5,6]);
        \App\Roles::find(2)->permisos()->sync([4,5,6]);
    }
}
