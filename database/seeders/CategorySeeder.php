<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('categories')->insert([
            [
                'category_name' => 'Transports',
                'user_id' => 1, // Assuming user_id 1 exists, adjust as necessary             
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Food',
                'user_id' => 1,             
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Shopping',
                'user_id' => 1,                
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_name' => 'Others',
                'user_id' => 1,             
                'created_at' => now(),
                'updated_at' => now(),
            ],
           
        ]);
    }
}
