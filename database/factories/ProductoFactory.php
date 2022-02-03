<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::inRandomOrder()
            ->first();
        return [
            'nombre' => $this->faker->word,
            'descripcion' => $this->faker->text,
            'cantidad' => 100,
            'estado' => true,
            'id_vendedor' =>  $user->id,
        ];
    }
}
