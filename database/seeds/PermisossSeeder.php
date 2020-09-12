<?php

use Illuminate\Database\Seeder;

class PermisossSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisos')->insert([
            [ 'nombre' => 'Crear Usuario', 'guardian' => 'crear_usuario'],
            [ 'nombre' => 'Editar Usuario', 'guardian' => 'editar_usuario'],
            [ 'nombre' => 'Eliminar Usuario', 'guardian' => 'eliminar_usuario'],

            [ 'nombre' => 'Crear Cliente', 'guardian' => 'crear_cliente'],
            [ 'nombre' => 'Editar Cliente', 'guardian' => 'editar_cliente'],
            [ 'nombre' => 'Eliminar Cliente', 'guardian' => 'eliminar_cliente'],
        ]);
    }
}
