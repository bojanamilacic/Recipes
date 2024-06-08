<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CommentsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('comments')->insert([
            ['user_id' => 1, 'recipe_id' => 2, 'text' => 'Great recipe!', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 2, 'recipe_id' => 3, 'text' => 'Loved it!', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 3, 'recipe_id' => 4, 'text' => 'Will make again.', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 4, 'recipe_id' => 5, 'text' => 'Easy and delicious.', 'created_at' => now(), 'updated_at' => now()],
            ['user_id' => 5, 'recipe_id' => 1, 'text' => 'Family favorite.', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
