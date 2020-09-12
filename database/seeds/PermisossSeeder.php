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
            [ 'nombre' => 'Actualizar Usuario', 'guardian' => 'actualizar_usuario'],

            [ 'nombre' => 'Crear Cliente', 'guardian' => 'crear_cliente'],
            [ 'nombre' => 'Editar Cliente', 'guardian' => 'editar_cliente'],
            [ 'nombre' => 'Actualizar Cliente', 'guardian' => 'actualizar_cliente'],
        ]);
    }
}
