<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('business')->insert([
            [
                'name' => 'Pizza Hut',
                'address' => '1 rue de la paix',
                'manager_id' => 16,
                'category_id' => 1,
            ],
            [
                'name' => 'Special Pizza',
                'address' => '1 rue de la paix',
                'manager_id' => 17,
                'category_id' => 1,
            ],
            [
                'name' => 'Crazy Cake',
                'address' => '1 rue de la paix',
                'manager_id' => 18,
                'category_id' => 2,
            ],
            [
                'name' => 'Anguilla Sushi',
                'address' => '1 rue de la paix',
                'manager_id' => 19,
                'category_id' => 3,
            ],
           
        ]);
    }
}
