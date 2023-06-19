<?php
//para auto crea 5 objetos de los que creamos fake
namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        \App\Models\auto::factory(5)->create();

        \App\Models\auto::factory(1)->create(
            ["id" => 77]
        );
    }
}
