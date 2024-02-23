<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Profesor>
 */
class ProfesorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $departamento=["informática", "Comercio","imagen"];
        return [
            'nombre'=> fake()->name(),
            'apellido'=> fake()->lastname(),
            'direccion'=> fake()->address(),
            'email'=> fake()->email()->safeEmail,
            'departamento'=> fake()->randomElement(),
            //
        ];
    }
}
