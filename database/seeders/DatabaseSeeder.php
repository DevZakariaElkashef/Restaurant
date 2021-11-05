<?php

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
        \App\Models\Restaurant::factory(1)->create();
        \App\Models\Message::factory(50)->create();
        \App\Models\Category::factory(10)->create();
        \App\Models\Dish::factory(50)->create();
        \App\Models\User::factory(50)->create();

    }
}
