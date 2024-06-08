<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'first_name' => 'John',
                'last_name' => 'Doe',
                'oib' => '12345678901',
                'birth_date' => '1985-01-01',
                'email' => 'john.doe@example.com',
                'phone' => '123456789',
                'street' => 'Main Street',
                'house_number' => '1',
                'city' => 'CityA',
                'postal_code' => '10000',
                'country' => 'CountryA',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Jane',
                'last_name' => 'Smith',
                'oib' => '12345678902',
                'birth_date' => '1990-02-02',
                'email' => 'jane.smith@example.com',
                'phone' => '234567890',
                'street' => 'Second Street',
                'house_number' => '2',
                'city' => 'CityB',
                'postal_code' => '20000',
                'country' => 'CountryB',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Alice',
                'last_name' => 'Johnson',
                'oib' => '12345678903',
                'birth_date' => '1980-03-03',
                'email' => 'alice.johnson@example.com',
                'phone' => '345678901',
                'street' => 'Third Street',
                'house_number' => '3',
                'city' => 'CityC',
                'postal_code' => '30000',
                'country' => 'CountryC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Bob',
                'last_name' => 'Brown',
                'oib' => '12345678904',
                'birth_date' => '1975-04-04',
                'email' => 'bob.brown@example.com',
                'phone' => '456789012',
                'street' => 'Fourth Street',
                'house_number' => '4',
                'city' => 'CityD',
                'postal_code' => '40000',
                'country' => 'CountryD',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'first_name' => 'Charlie',
                'last_name' => 'Davis',
                'oib' => '12345678905',
                'birth_date' => '2000-05-05',
                'email' => 'charlie.davis@example.com',
                'phone' => '567890123',
                'street' => 'Fifth Street',
                'house_number' => '5',
                'city' => 'CityE',
                'postal_code' => '50000',
                'country' => 'CountryE',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

