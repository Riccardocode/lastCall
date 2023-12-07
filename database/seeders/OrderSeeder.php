<?php

namespace Database\Seeders;

use App\Models\Business;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('orders')->insert([
            [
                'orderDate' => now(),
                'totalAmount' => 25,
                'status' => 'cart',
                'user_id' => 6,
                'Business_id' =>1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 30,
                'status' => 'cart',
                'user_id' => 7,
                'Business_id' =>1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 40,
                'status' => 'cart',
                'user_id' => 7,
                'Business_id' =>1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 40,
                'status' => 'cart',
                'user_id' => 8,
                'Business_id' =>2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 40,
                'status' => 'cart',
                'user_id' => 8,
                'Business_id' =>2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 25,
                'status' => 'cart',
                'user_id' => 8,
                'Business_id' =>2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 45,
                'status' => 'cart',
                'user_id' => 8,
                'Business_id' =>2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 50,
                'status' => 'cart',
                'user_id' => 8,
                'Business_id' =>2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 45,
                'status' => 'cart',
                'user_id' => 8,
                'Business_id' =>3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'orderDate' => now(),
                'totalAmount' => 45,
                'status' => 'cart',
                'user_id' => 8,
                'Business_id' =>3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);
    }
}
