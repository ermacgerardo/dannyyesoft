<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TwContratoCorporativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'D_FechaIncorporacion'=> $this->faker->date('Y-m-d'),
            'D_FechaFin'=> $this->faker->date('Y-m-d'),
            //'S_URLContrato'=> $this->faker->url(),--comentado:el url algunas veces sobrepasa el tamaño del campo
            'S_URLContrato'=> 'https://google.com',
        ];
    }
}
