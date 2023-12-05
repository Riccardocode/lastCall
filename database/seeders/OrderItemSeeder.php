<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('order_items')->insert([
            [
                'quantity'=> 2,
                'order_id'=> 1,
                'sales_lots_id'=> 1,
            ],
            [
                'quantity'=> 3,
                'order_id'=> 1,
                'sales_lots_id'=> 1,
            ],
            [
                'quantity'=> 2,
                'order_id'=> 2,
                'sales_lots_id'=> 2,
            ],
            [
                'quantity'=> 2,
                'order_id'=> 1,
                'sales_lots_id'=> 2,
            ],
        ]);
    }
}
