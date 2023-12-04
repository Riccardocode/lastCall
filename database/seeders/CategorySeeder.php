<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            [
                'name' => 'Pizza',
            ],
            [
                'name' => 'Dessert',
            ],
            [
                'name' => 'Sushi',
            ],
            [
                'name' => 'Burger',
            ],
            [
                'name' => 'Pasta',
            ],
            [
                'name' => 'Salad',
            ],
            [
                'name' => 'Sandwich',
            ],
            [
                'name' => 'Drink',
            ],
            [
                'name' => 'Other',
            ],
        ]);
    }
}
