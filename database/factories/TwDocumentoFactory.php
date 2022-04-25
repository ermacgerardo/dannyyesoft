<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TwDocumentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_Nombre' => $this->faker->unique()->word(),
            'N_Obligatorio' => $this->faker->numberBetween(0,1),
            'S_Descripcion' => $this->faker->unique()->paragraph(),
            
        ];
    }
}
