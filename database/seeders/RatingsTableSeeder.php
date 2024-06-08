<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RatingsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ratings')->insert([
            ['user_id' => 1, 'recipe_id' => 2, 'value' => 8, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'recipe_id' => 3, 'value' => 9, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'recipe_id' => 4, 'value' => 7, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'recipe_id' => 5, 'value' => 6, 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'recipe_id' => 1, 'value' => 10, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
