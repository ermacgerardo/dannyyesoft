<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TwEmpresaCorporativoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'S_RazonSocial'=>$this->faker->company(),
            'S_RFC'=>$this->faker->countryCode(),
            'S_Pais'=>$this->faker->country(),
            'S_Estado'=>$this->faker->city(),
            'S_Municipio'=>$this->faker->text(12),
            'S_ColoniaLocalidad'=>$this->faker->text(12),
            'S_Domicilio'=>$this->faker->text(12),
            'S_CodigoPostal'=>$this->faker->text(5), //postcode(),
            'S_UsoCFDI'=>$this->faker->text(10),
            'S_UrlRFC'=>$this->faker->text(10),
            'S_UrlActaConstitutiva'=>"https://google.com",//deberimaos utilizar url
            'S_Activo'=>1,
            'S_Comentarios'=>$this->faker->paragraph(),
        ];
    }
}
