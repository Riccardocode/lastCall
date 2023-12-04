<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            // Pizza items (Business ID 1)
            ['name' => 'Pizza Margherita', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'Tomato sauce, mozzarella, basil', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Pizza Capricciosa', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'Tomato sauce, mozzarella, ham, mushrooms, artichokes, olives', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Pepperoni Pizza', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'Tomato sauce, mozzarella, pepperoni', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Veggie Pizza', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'Tomato sauce, mozzarella, bell peppers, onions, olives, mushrooms', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'BBQ Chicken Pizza', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'BBQ sauce, chicken, red onions, cilantro', 'allergyString' => 'Gluten', 'picture' => '', 'business_id' => 1],
            ['name' => 'Hawaiian Pizza', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'Tomato sauce, mozzarella, ham, pineapple', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Four Cheese Pizza', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'Tomato sauce, mozzarella, parmesan, gorgonzola, ricotta', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Meat Lover’s Pizza', 'category' => 1, 'quantity' => 10, 'ingredientString' => 'Tomato sauce, mozzarella, pepperoni, sausage, bacon, ham', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],

            // Cake items (Business ID 2)
            ['name' => 'Magic Cake', 'category' => 2, 'quantity' => 10, 'ingredientString' => 'Flour, sugar, eggs, vanilla extract', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Chocolate Cake', 'category' => 2, 'quantity' => 10, 'ingredientString' => 'Flour, sugar, eggs, cocoa powder', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Red Velvet Cake', 'category' => 2, 'quantity' => 10, 'ingredientString' => 'Flour, sugar, buttermilk, cocoa powder, red food coloring', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Carrot Cake', 'category' => 2, 'quantity' => 10, 'ingredientString' => 'Flour, sugar, carrots, eggs, spices', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Lemon Cake', 'category' => 2, 'quantity' => 10, 'ingredientString' => 'Flour, sugar, eggs, lemon zest, lemon juice', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],

            // Sushi items (Business ID 3)
            ['name' => 'Magic Sushi', 'category' => 3, 'quantity' => 10, 'ingredientString' => 'Rice, nori, salmon, avocado', 'allergyString' => 'Fish, soy', 'picture' => '', 'business_id' => 3],
            ['name' => 'California Roll', 'category' => 3, 'quantity' => 10, 'ingredientString' => 'Rice, nori, crab meat, avocado, cucumber', 'allergyString' => 'Shellfish, soy', 'picture' => '', 'business_id' => 3],
            ['name' => 'Tuna Roll', 'category' => 3, 'quantity' => 10, 'ingredientString' => 'Rice, nori, tuna', 'allergyString' => 'Fish, soy', 'picture' => '', 'business_id' => 3],
            ['name' => 'Salmon Nigiri', 'category' => 3, 'quantity' => 10, 'ingredientString' => 'Rice, salmon', 'allergyString' => 'Fish, soy', 'picture' => '', 'business_id' => 3],
            ['name' => 'Tempura Roll', 'category' => 3, 'quantity' => 10, 'ingredientString' => 'Rice, nori, shrimp tempura, avocado, cucumber', 'allergyString' => 'Shellfish, gluten, soy', 'picture' => '', 'business_id' => 3],
            ['name' => 'Dragon Roll', 'category' => 3, 'quantity' => 10, 'ingredientString' => 'Rice, nori, eel, cucumber, avocado', 'allergyString' => 'Fish, soy', 'picture' => '', 'business_id' => 3],
            ['name' => 'Rainbow Roll', 'category' => 3, 'quantity' => 10, 'ingredientString' => 'Rice, nori, crab meat, avocado, assorted fish toppings', 'allergyString' => 'Fish, shellfish, soy', 'picture' => '', 'business_id' => 3],
        ]);
    }
}
