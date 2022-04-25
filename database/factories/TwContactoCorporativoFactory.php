<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TwContactoCorporativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_Nombre'=>$this->faker->unique()->name(),
            'S_Puesto'=>$this->faker->jobTitle(),
            'S_Comentarios'=>$this->faker->paragraph(),
            'S_TelefonoFijo'=>$this->faker->text(12),//quizas sea mejor usar phoneNumber(), pero el tamaño del campo es limitado
            'S_TelefonoMovil'=>$this->faker->text(12),//quizas sea mejor usar phoneNumber(), pero el tamaño del campo es limitado
            'S_Email'=>$this->faker->email(),
        ];
    }
}
