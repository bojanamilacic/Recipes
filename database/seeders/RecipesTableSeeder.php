<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('recipes')->insert([
            ['name' => 'Pancakes', 'user_id' => 1, 'servings' => 4, 'preparation' => 'Mix ingredients and cook.', 'preparation_time' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cake', 'user_id' => 2, 'servings' => 8, 'preparation' => 'Bake the cake.', 'preparation_time' => 60, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salad', 'user_id' => 3, 'servings' => 2, 'preparation' => 'Mix veggies.', 'preparation_time' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Soup', 'user_id' => 4, 'servings' => 6, 'preparation' => 'Boil ingredients.', 'preparation_time' => 45, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Pizza', 'user_id' => 5, 'servings' => 3, 'preparation' => 'Bake the pizza.', 'preparation_time' => 30, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
