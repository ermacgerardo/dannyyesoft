<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//use App\Models\User;
//use App\Models\TwCorporativo;
use App\Traits\GlobalTrait;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        /*Se reemplaza para incluir lo correspondiente en el inciso 11
         * 
         * User::factory()
            ->count(10)
            ->hasCorporativos()
            ->create();*/
        GlobalTrait::crearRegistros(10);
        
    }
}
