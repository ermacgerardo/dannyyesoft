<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TwCorporativo;

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
        User::factory()
            ->count(10)
            ->hasCorporativos()
            ->create();
//       TwCorporativo::factory()
//            ->count(10)
//            ->create(); 
    }
}
