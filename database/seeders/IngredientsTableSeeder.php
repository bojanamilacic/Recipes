<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IngredientsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('ingredients')->insert([
            ['name' => 'Flour', 'price' => 1.50, 'type' => 'other', 'unit' => 'kg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Sugar', 'price' => 1.20, 'type' => 'spices', 'unit' => 'kg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Salt', 'price' => 0.80, 'type' => 'spices', 'unit' => 'kg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Eggs', 'price' => 2.00, 'type' => 'other', 'unit' => 'piece', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Milk', 'price' => 0.99, 'type' => 'other', 'unit' => 'liter', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Apple', 'price' => 1.30, 'type' => 'fruit', 'unit' => 'kg', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Carrot', 'price' => 0.90, 'type' => 'vegetables', 'unit' => 'kg', 'created_at' => now(), 'updated_at' => now()],
        ]);
        
    }
}
