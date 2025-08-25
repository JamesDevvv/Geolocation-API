<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('password123'),
            'ip' => '8.8.8.8',
            'geo_info' => json_encode([
                'ip' => '8.8.8.8',
                'city' => 'Mountain View',
                'region' => 'California',
                'country' => 'United States',
                'country_code' => 'US',
                'latitude' => 37.4056,
                'longitude' => -122.0775,
                'timezone' => 'America/Los_Angeles',
                'isp' => 'Google LLC'
            ]),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
