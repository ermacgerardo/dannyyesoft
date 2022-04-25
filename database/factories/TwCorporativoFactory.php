<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
class TwCorporativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_NombreCorto' => $this->faker->unique()->company(),
            'S_NombreCompleto' => $this->faker->unique()->company(),
            'S_DBName' => $this->faker->unique()->userName(),
            'S_DBUsuario' => $this->faker->unique()->userName(),
            'S_DBPassword' => bcrypt('12345'),
            'S_SystemUrl' => $this->faker->url(),
            'D_FechaIncorporacion' => $this->faker->dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null),
            
        ];
    }
}
