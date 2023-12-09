<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SalesLotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sales_lots')->insert([
            [
                'product_id' => 1,
                'description' => 'Pizza 4 fromages',
                'price' => 10,
                'initial_quantity' => 10,
                'current_quantity' => 10,
                'discount'=>10,
                'start_date'=>now(),
                'end_date'=>now()->addHours(5),
            ],
            [
                'product_id' => 2,
                'description' => 'Pizza 5 fromages',
                'price' => 10,
                'initial_quantity' => 10,
                'current_quantity' => 10,
                'discount'=>10,
                'start_date'=>now(),
                'end_date'=>now()->addHours(5),
            ]
        ]);
    }
}
