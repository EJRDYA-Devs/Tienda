<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'categoria_id' => 1,
                'producto_id' => 1,
            ],
            [
                'categoria_id' => 1,
                'producto_id' => 2,
            ],
            [
                'categoria_id' => 1,
                'producto_id' => 3,
            ],
            [
                'categoria_id' => 2,
                'producto_id' => 4,
            ],
            [
                'categoria_id' => 3,
                'producto_id' => 5,
            ]

        ];

        DB::table('categoria_producto')->insert($data);
    }
}
