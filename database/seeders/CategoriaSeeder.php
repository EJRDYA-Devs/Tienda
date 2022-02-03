<?php

namespace Database\Seeders;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = array(
            'Accesorios',
            'Monitores',
            'CPU',
            'Mouses',
            'Graficas',
        );
        collect($categorias)->each(function ($categoria) {
            $categoria = Categoria::factory()
                ->has(Producto::factory()->count(5))
                ->create([
                    'nombre' => $categoria,
                ]);
        });
    }
}
