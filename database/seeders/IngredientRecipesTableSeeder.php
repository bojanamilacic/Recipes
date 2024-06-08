<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientRecipesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredient_recipes')->insert([
            ['recipe_id' => 1, 'ingredient_id' => 1, 'quantity' => 0.5, 'created_at' => now(), 'updated_at' => now()],
            ['recipe_id' => 1, 'ingredient_id' => 2, 'quantity' => 0.2, 'created_at' => now(), 'updated_at' => now()],
            ['recipe_id' => 2, 'ingredient_id' => 3, 'quantity' => 0.1, 'created_at' => now(), 'updated_at' => now()],
            ['recipe_id' => 2, 'ingredient_id' => 4, 'quantity' => 1.0, 'created_at' => now(), 'updated_at' => now()],
            ['recipe_id' => 3, 'ingredient_id' => 5, 'quantity' => 0.3, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
