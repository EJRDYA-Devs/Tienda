<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre'         => 'Anthony Medina',
            'email'           => 'administrador@pesplanet.com',
            'password'        => Hash::make('pesplanet2022.'),
            'verificado'          => 1,
            'verificacion_token'          => 1,
            'admin'          => 1,
            'created_at'      => now(),
            'updated_at'      => now()
        ]);
    }
}
