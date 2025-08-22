<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'demo_user_one',
                'email' => 'demo_user_one@gmail.com',
                'mobile' => '01712345678',
                'password' => Hash::make('12345678'),
                'created_at' => now(), // Using Laravel's helper function for the current timestamp
                'updated_at' => now(), // Add updated_at to maintain consistency
            ],
            [
                'name' => 'demo_user_two',
                'email' => 'demo_user_two@gmail.com',
                'mobile' => '01712345679',
                'password' => Hash::make('12345678'),
                'created_at' => now(), // Using Laravel's helper function for the current timestamp
                'updated_at' => now(), // Add updated_at to maintain consistency
            ],
        ]);
    }
}
