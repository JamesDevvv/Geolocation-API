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
            [
                'name' => 'Test User 1',
                'email' => 'test1@example.com',
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
            ],
            [
                'name' => 'Test User 2',
                'email' => 'test2@example.com',
                'password' => Hash::make('password123'),
                'ip' => '1.1.1.1',
                'geo_info' => json_encode([
                    'ip' => '1.1.1.1',
                    'city' => 'Sydney',
                    'region' => 'New South Wales',
                    'country' => 'Australia',
                    'country_code' => 'AU',
                    'latitude' => -33.8591,
                    'longitude' => 151.2002,
                    'timezone' => 'Australia/Sydney',
                    'isp' => 'Cloudflare'
                ]),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User 3',
                'email' => 'test3@example.com',
                'password' => Hash::make('password123'),
                'ip' => '208.67.222.222',
                'geo_info' => json_encode([
                    'ip' => '208.67.222.222',
                    'city' => 'San Francisco',
                    'region' => 'California',
                    'country' => 'United States',
                    'country_code' => 'US',
                    'latitude' => 37.7749,
                    'longitude' => -122.4194,
                    'timezone' => 'America/Los_Angeles',
                    'isp' => 'OpenDNS, LLC'
                ]),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User 4',
                'email' => 'test4@example.com',
                'password' => Hash::make('password123'),
                'ip' => '9.9.9.9',
                'geo_info' => json_encode([
                    'ip' => '9.9.9.9',
                    'city' => 'New York',
                    'region' => 'New York',
                    'country' => 'United States',
                    'country_code' => 'US',
                    'latitude' => 40.7128,
                    'longitude' => -74.0060,
                    'timezone' => 'America/New_York',
                    'isp' => 'Quad9'
                ]),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Test User 5',
                'email' => 'test5@example.com',
                'password' => Hash::make('password123'),
                'ip' => '114.114.114.114',
                'geo_info' => json_encode([
                    'ip' => '114.114.114.114',
                    'city' => 'Nanjing',
                    'region' => 'Jiangsu',
                    'country' => 'China',
                    'country_code' => 'CN',
                    'latitude' => 32.0617,
                    'longitude' => 118.7778,
                    'timezone' => 'Asia/Shanghai',
                    'isp' => 'China Telecom'
                ]),
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
