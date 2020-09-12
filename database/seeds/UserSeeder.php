<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'administrador',
                'email' => 'admin@gmail.com',
                'roles_id' => 1,
                'password' => Hash::make('admin123'),
            ],
            [
                'name' => 'vendedor',
                'email' => 'vendedor@gmail.com',
                'roles_id' => 2,
                'password' => Hash::make('vendedor123'),
            ],
        ]);
    }
}
