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
            //! Pizza items (Business ID 1)
            ['name' => 'Pizza Margherita', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, basil', 'allergyString' => 'Gluten, lactose', 'picture' => 'productPictures/1.png', 'business_id' => 1],
            ['name' => 'Pizza Capricciosa', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, ham, mushrooms, artichokes, olives', 'allergyString' => 'Gluten, lactose', 'picture' => 'productPictures/2.png', 'business_id' => 1],
            ['name' => 'Pepperoni Pizza', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, pepperoni', 'allergyString' => 'Gluten, lactose', 'picture' => 'productPictures/3.png', 'business_id' => 1],
            ['name' => 'Veggie Pizza', 'category' => "Vegan",  'ingredientString' => 'Tomato sauce, mozzarella, bell peppers, onions, olives, mushrooms', 'allergyString' => 'Gluten, lactose', 'picture' => 'productPictures/4.png', 'business_id' => 1],
            ['name' => 'BBQ Chicken Pizza', 'category' => "Non-Vegetarian",  'ingredientString' => 'BBQ sauce, chicken, red onions, cilantro', 'allergyString' => 'Gluten', 'picture' => 'productPictures/5.png', 'business_id' => 1],

            //! Cake items (Business ID 2)
            ['name' => 'Magic Cake', 'category' => "Vegan",  'ingredientString' => 'Flour, sugar, eggs, vanilla extract', 'allergyString' => 'Gluten, eggs', 'picture' => 'productPictures/6.png', 'business_id' => 2],
            ['name' => 'Chocolate Cake', 'category' => "vegetarian",  'ingredientString' => 'Flour, sugar, eggs, cocoa powder', 'allergyString' => 'Gluten, eggs', 'picture' => 'productPictures/7.png', 'business_id' => 2],
            ['name' => 'Red Velvet Cake', 'category' => "vegetarian",  'ingredientString' => 'Flour, sugar, buttermilk, cocoa powder, red food coloring', 'allergyString' => 'Gluten, eggs', 'picture' => 'productPictures/8.png', 'business_id' => 2],
            ['name' => 'Carrot Cake', 'category' => "Vegan",  'ingredientString' => 'Flour, sugar, carrots, eggs, spices', 'allergyString' => 'Gluten, eggs', 'picture' => 'productPictures/9.png', 'business_id' => 2],
            ['name' => 'Lemon Cake', 'category' => "Vegan",  'ingredientString' => 'Flour, sugar, eggs, lemon zest, lemon juice', 'allergyString' => 'Gluten, eggs', 'picture' => 'productPictures/10.png', 'business_id' => 2],

            //! Athena Restaurant Grec (Business ID 3)
            ['name' => 'Assiette «Athena»', 'category' => "Non-Vegetarian",  'ingredientString' => 'Fillet of chicken, beef, lamb ,tzatziki, potatoes', 'allergyString' => 'Milk', 'picture' => 'productPictures/11.png', 'business_id' => 3],
            ['name' => 'Gyros', 'category' => "Non-Vegetarian",  'ingredientString' => 'Pork gyros, tzatziki, sautéed potatoes', 'allergyString' => 'Milk', 'picture' => 'productPictures/12.png', 'business_id' => 3],
            ['name' => 'Espadon', 'category' => "Non-vegeterian",  'ingredientString' => 'Swordfish', 'allergyString' => 'Fish, Sulfur', 'picture' => 'productPictures/13.png', 'business_id' => 3],
            ['name' => 'Gemista', 'category' => "Non-vegetarian",  'ingredientString' => 'Peppers ,tomatoes ,meat ,rice ,potatoes', 'allergyString' => 'Milk', 'picture' => 'productPictures/14.png', 'business_id' => 3],
            ['name' => 'Solomos', 'category' => "Vegan",  'ingredientString' => 'salmon ,olive oil ,lemon', 'allergyString' => 'Fish, Sulfur', 'picture' => 'productPictures/15.png', 'business_id' => 3],

            //! Fu Lu Shou Inn (Business ID 4)
            ['name' => 'Duck and Veggie', 'category' => "Non-Vegetarian",  'ingredientString' => 'Duck, potatoes,', 'allergyString' => 'Soy', 'picture' => 'productPictures/16.png', 'business_id' => 4],
            ['name' => 'Prawns Royal', 'category' => "Vegetarian",  'ingredientString' => 'Scampi, Soy Sauce, rice, vegetables', 'allergyString' => 'Soy', 'picture' => 'productPictures/17.png', 'business_id' => 4],
            ['name' => 'Stir-fried squids', 'category' => "Vegetarian",  'ingredientString' => 'Squid, rice, tomatoes, cucumber', 'allergyString' => 'Fish, Sulfur', 'picture' => 'productPictures/18.png', 'business_id' => 4],
            ['name' => 'Gemista', 'category' => "Non-Vegetarian",  'ingredientString' => 'Peppers ,tomatoes ,meat ,rice ,potatoes', 'allergyString' => 'Milk', 'picture' => 'productPictures/19.png', 'business_id' => 3],
            ['name' => 'Solomos', 'category' => "Vegan",  'ingredientString' => 'salmon ,olive oil ,lemon', 'allergyString' => 'Fish, Sulfur', 'picture' => 'productPictures/20.png', 'business_id' => 3],

            //! Radici (Business ID 5)
            ["name" => "Antipasto Misto", "category" => "Non-Vegetarian", "ingredientString" => "Prosciutto Crudo, Salame di Milano, Mozzarella di Bufala, Pomodori Confit, Olive Ascolane, Funghi Porcini, Gamberi Bianchi, Carpaccio di Manzo, Rucola, Aceto Balsamico Tradizionale di Modena, Olio Extra Vergine di Oliva", "allergyString" => "Dairy, Gluten, Shellfish, Tree Nuts", "picture" => "productPictures/21.png", 'business_id' => 4],
            [
                "name" => "Carpaccio di Pesce Spada",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pesce Spada, Capperi, Limone, Olio Extra Vergine di Oliva",
                "allergyString" => "Fish, Sulfites",
                "picture" => "productPictures/22.png",
                'business_id' => 5
            ],
            [
                "name" => "Tagliatelle Alla Grana",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tagliatelle, Grana Padano, Burro, Salvia",
                "allergyString" => "Dairy",
                "picture" => "productPictures/23.png",
                'business_id' => 5
            ],
            [
                "name" => "Gnocchi alla Sorrentina",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Gnocchi,Mozzarella, basil",
                "allergyString" => "Dairy",
                "picture" => "productPictures/24.png",
                'business_id' => 5
            ],
            [
                "name" => "Spaghetti Carbonara",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Guanciale, egg, pecorino",
                "allergyString" => "Dairy",
                "picture" => "productPictures/25.png",
                'business_id' => 5
            ],

            //! Le Sud (Business ID 6)
            [
                "name" => "Hummus",
                "category" => "Vegan",
                "ingredientString" => "chickpeas, tahini, olive oil, lemon juice, garlic, salt",
                "allergyString" => "None",
                "picture" => "productPictures/26.png",
                "business_id" => 6
            ],
            [
                "name" => "Baba ghanoush",
                "category" => "Vegan",
                "ingredientString" => "eggplant, tahini, lemon juice, olive oil, garlic, salt",
                "allergyString" => "None",
                "picture" => "productPictures/27.png",
                "business_id" => 6
            ],
            [
                "name" => "Shakshuka",
                "category" => "Vegan",
                "ingredientString" => "tomatoes, onions, peppers, eggs, chickpeas, spices",
                "allergyString" => "None",
                "picture" => "productPictures/28.png",
                "business_id" => 6
            ],
            [
                "name" => "Shakshuka-super",
                "category" => "Vegan",
                "ingredientString" => "tomatoes, onions, peppers, eggs, chickpeas, spices",
                "allergyString" => "None",
                "picture" => "productPictures/29.png",
                "business_id" => 6
            ],
            [
                "name" => "Tabouleh",
                "category" => "Vegan",
                "ingredientString" => "bulgur wheat, parsley, mint, tomatoes, lemon juice, olive oil, salt",
                "allergyString" => "None",
                "picture" => "productPictures/30.png",
                "business_id" => 6
            ],

            //! Le Sud (Business ID 7)
            [
                "name" => "Calamari Fritti",
                "category" => "Appetizers",
                "ingredientString" => "calamari, flour, breadcrumbs, olive oil, lemon, salt",
                "allergyString" => "Seafood, Gluten",
                "picture" => "productPictures/31.png",
                "business_id" => 7
            ],
            [
                "name" => "Mozzarella Sticks",
                "category" => "Appetizers",
                "ingredientString" => "mozzarella cheese, flour, breadcrumbs, olive oil, tomato sauce, salt",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/32.png",
                "business_id" => 7
            ],
            [
                "name" => "Fish & Chips",
                "category" => "Non-Vegetarian",
                "ingredientString" => "cod, flour, breadcrumbs, olive oil, vinegar, salt, potatoes",
                "allergyString" => "Seafood, Gluten",
                "picture" => "productPictures/33.png",
                "business_id" => 7
            ],
            [
                "name" => "Grilled Salmon",
                "category" => "Non-Vegetarian",
                "ingredientString" => "salmon, olive oil, lemon, salt, pepper",
                "allergyString" => "Fish, Sulfur",
                "picture" => "productPictures/34.png",
                "business_id" => 7
            ],
            [
                "name" => "Creamy Tomato Soup",
                "category" => "Sides",
                "ingredientString" => "tomatoes, cream, flour, butter, salt, pepper, basil",
                "allergyString" => "Dairy",
                "picture" => "productPictures/35.png",
                "business_id" => 7
            ],

            //! Basta Cosi Louvigny (Business ID 8)
            [
                "name" => "Pizza Margherita",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, basil",
                "allergyString" => "Dairy",
                "picture" => "productPictures/36.png",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Marinara",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, garlic, oregano",
                "allergyString" => "None",
                "picture" => "productPictures/37.png",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Capricciosa",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, ham, mushrooms, artichokes, olives",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/38.png",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Quattro Formaggi",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, gorgonzola cheese, parmesan cheese, fontina cheese",
                "allergyString" => "Dairy",
                "picture" => "productPictures/39.png",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Prosciutto e Funghi",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, prosciutto ham, mushrooms",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/40.png",
                "business_id" => 8
            ],

            //! Ambrosia Restaurant (Business ID 9)
            [
                "name" => "Gnocchi Caprese",
                "category" => "Vegan",
                "ingredientString" => "gnocchi, tomato sauce, mozzarella cheese, basil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/41.png",
                "business_id" => 9
            ],
            [
                "name" => "Penne Arrabiata",
                "category" => "Vegan",
                "ingredientString" => "penne pasta, tomato sauce, chili flakes, garlic, olive oil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/42.png",
                "business_id" => 9
            ],
            [
                "name" => "Lasagna Classica",
                "category" => "Non-Vegetarian",
                "ingredientString" => "lasagna noodles, meat sauce, béchamel sauce, parmesan cheese, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/43.png",
                "business_id" => 9
            ],
            [
                "name" => "Pollo Parmigiana",
                "category" => "Non-Vegetarian",
                "ingredientString" => "chicken breast, breadcrumbs, marinara sauce, mozzarella cheese, basil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/44.png",
                "business_id" => 9
            ],
            [
                "name" => "Tiramisu",
                "category" => "Dessert",
                "ingredientString" => "ladyfingers, espresso, mascarpone cheese, cocoa powder, sugar",
                "allergyString" => "Dairy",
                "picture" => "productPictures/45.png",
                "business_id" => 9
            ],

            //! Lux'Burgers (Business ID 10)
            [
                "name" => "Classic Cheeseburger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Beef patty, sesame seed bun, lettuce, tomato, onion, pickles, cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/46.png",
                "business_id" => 10
            ],
            [
                "name" => "Double Cheeseburger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Two beef patties, sesame seed bun, lettuce, tomato, onion, pickles, cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/46.png",
                "business_id" => 10
            ],
            [
                "name" => "Grilled Chicken Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Grilled chicken patty, sesame seed bun, lettuce, tomato, onion, pickles",
                "allergyString" => "Gluten",
                "picture" => "productPictures/48.png",
                "business_id" => 10
            ],
            [
                "name" => "Veggie Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Black bean patty, sesame seed bun, lettuce, tomato, onion, pickles",
                "allergyString" => "None",
                "picture" => "productPictures/49.png",
                "business_id" => 10
            ],
            [
                "name" => "Falafel Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Falafel patty, sesame seed bun, hummus, tahini, lettuce, tomato, onion",
                "allergyString" => "Gluten",
                "picture" => "productPictures/50.png",
                "business_id" => 10
            ],

            //! il piccolino (Business ID 11)
            [
                "name" => "Pasta al Limone",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, lemon juice, olive oil, butter, salt, pepper",
                "allergyString" => "Dairy",
                "picture" => "productPictures/51.png",
                "business_id" => 11
            ],
            [
                "name" => "Tagliatelle al Ragu",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, meat sauce, parmesan cheese, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/52.png",
                "business_id" => 11
            ],
            [
                "name" => "Frutti di Mare",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, shrimp, mussels, clams, white wine, garlic, parsley, salt, pepper",
                "allergyString" => "Shellfish, Dairy, Gluten",
                "picture" => "productPictures/53.png",
                "business_id" => 11
            ],
            [
                "name" => "Pizza Margherita",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tomato sauce, mozzarella cheese, basil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/54.png",
                "business_id" => 11
            ],
            [
                "name" => "Insalata Caprese",
                "category" => "Vegan",
                "ingredientString" => "Mozzarella cheese, tomatoes, basil, olive oil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/55.png",
                "business_id" => 11
            ],

            //! Postkutsch (Business ID 12)
            [
                "name" => "Käsefondue",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Gruyère cheese, Emmental cheese, white wine, garlic, kirsch, bread",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/56.png",
                "business_id" => 12
            ],
            [
                "name" => "Raclette",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Raclette cheese, potatoes, onions, pickles, cornichons, gherkins, mustard, bread",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/57.png",
                "business_id" => 12
            ],
            [
                "name" => "Tiramisu",
                "category" => "Vegetarian",
                "ingredientString" => "Ladyfingers, espresso, mascarpone cheese, cocoa powder, sugar",
                "allergyString" => "Dairy",
                "picture" => "productPictures/58.png",
                "business_id" => 12
            ],
            [
                "name" => "Apfelstrudel",
                "category" => "Vegetarian",
                "ingredientString" => "Strudel dough, apples, cinnamon, sugar, raisins, walnuts, butter, apricot jam",
                "allergyString" => "Gluten, Dairy",
                "picture" => "productPictures/59.png",
                "business_id" => 12
            ],
            [
                "name" => "Zopf",
                "category" => "Breads",
                "ingredientString" => "Flour, yeast, milk, sugar, eggs, butter, salt",
                "allergyString" => "Gluten",
                "picture" => "productPictures/60.png",
                "business_id" => 12
            ],

            //! Bombay Inn (Business ID 13)
            [
                "name" => "Chicken Tikka Masala",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Chicken, tomato puree, cream, spices, garlic, ginger, garam masala",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/61.png",
                "business_id" => 13
            ],
            [
                "name" => "Samosas",
                "category" => "Vegan",
                "ingredientString" => "Pastry, potatoes, peas, onions, spices, tamarind chutney",
                "allergyString" => "Gluten",
                "picture" => "productPictures/62.png",
                "business_id" => 13
            ],
            [
                "name" => "Naan Bread",
                "category" => "Accompaniments",
                "ingredientString" => "Flour, yeast, milk, butter, sugar, salt",
                "allergyString" => "Gluten",
                "picture" => "productPictures/63.png",
                "business_id" => 13
            ],
            [
                "name" => "Gajar Halwa",
                "category" => "Vegetarian",
                "ingredientString" => "Carrot, butter, milk, cream, sugar, nuts, spices",
                "allergyString" => "Milk, Dairy",
                "picture" => "productPictures/64.png",
                "business_id" => 13
            ],
            [
                "name" => "Lassi",
                "category" => "Drinks",
                "ingredientString" => "Yogurt, water, sugar, flavorings",
                "allergyString" => "Dairy, Milk",
                "picture" => "productPictures/65.png",
                "business_id" => 13
            ],

            //! Pokhara (Business ID 14)
            [
                "name" => "Dal Bhat",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Lentils, rice, spices",
                "allergyString" => "None",
                "picture" => "productPictures/66.png",
                "business_id" => 14
            ],
            [
                "name" => "Chicken Momo",
                "category" => "Vegan",
                "ingredientString" => "Chicken, dough, spices, vegetables",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/67.png",
                "business_id" => 14
            ],
            [
                "name" => "Vegetable Curry",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Vegetables, spices, coconut milk",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/68.png",
                "business_id" => 14
            ],
            [
                "name" => "Papadum",
                "category" => "Vegan",
                "ingredientString" => "Lentil flour, spices",
                "allergyString" => "Gluten",
                "picture" => "productPictures/69.png",
                "business_id" => 14
            ],
            [
                "name" => "Papadum-premium",
                "category" => "Vegan",
                "ingredientString" => "Lentil flour, spices",
                "allergyString" => "Gluten",
                "picture" => "productPictures/70.png",
                "business_id" => 14
            ],

            //! Antica Bari (Business ID 15)
            [
                "name" => "Margherita",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tomato sauce, mozzarella cheese, basil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/71.png",
                "business_id" => 15
            ],
            [
                "name" => "Pizza Marinara",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tomato sauce, garlic, oregano",
                "allergyString" => "None",
                "picture" => "productPictures/72.png",
                "business_id" => 15
            ],
            [
                "name" => "Penne Arrabbiata",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Penne pasta, tomato sauce, chili flakes, garlic, olive oil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/73.png",
                "business_id" => 15
            ],
            [
                "name" => "Frutti di Mare",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, shrimp, mussels, clams, tomato sauce, white wine, garlic, parsley",
                "allergyString" => "Shellfish, Dairy, Gluten",
                "picture" => "productPictures/74.png",
                "business_id" => 15
            ],
            [
                "name" => "Tiramisu",
                "category" => "Vegetarian",
                "ingredientString" => "Ladyfingers, espresso, mascarpone cheese, cocoa powder, sugar",
                "allergyString" => "Dairy",
                "picture" => "productPictures/75.png",
                "business_id" => 15
            ],

            //! Loxalis (Business ID 16)
            [
                "name" => "Salmon Salad",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Salmon, lettuce, tomato, cucumber, dill, lemon",
                "allergyString" => "Fish, Sulfur",
                "picture" => "productPictures/76.png",
                "business_id" => 16
            ],
            [
                "name" => "Falafel Wrap",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Falafel, hummus, tahini, lettuce, tomato, cucumber",
                "allergyString" => "Gluten",
                "picture" => "productPictures/77.png",
                "business_id" => 16
            ],
            [
                "name" => "Hummus Plate",
                "category" => "Vegan",
                "ingredientString" => "Hummus, pita bread, olive oil, parsley",
                "allergyString" => "None",
                "picture" => "productPictures/78.png",
                "business_id" => 16
            ],
            [
                "name" => "Shawarma",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Shawarma meat, hummus, tahini, lettuce, tomato, cucumber",
                "allergyString" => "Gluten",
                "picture" => "productPictures/79.png",
                "business_id" => 16
            ],
            [
                "name" => "Baklava",
                "category" => "Vegetarian",
                "ingredientString" => "Phyllo dough, nuts, honey, syrup",
                "allergyString" => "Gluten",
                "picture" => "productPictures/80.png",
                "business_id" => 16
            ],

            //! Cafe Coyote Belval (Business ID 17)
            [
                "name" => "Classic Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Beef patty, sesame seed bun, lettuce, tomato, onion, pickles, cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/81.png",
                "business_id" => 17
            ],
            [
                "name" => "Double Cheeseburger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Two beef patties, sesame seed bun, lettuce, tomato, onion, pickles, two cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/82.png",
                "business_id" => 17
            ],
            [
                "name" => "Grilled Chicken Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Grilled chicken patty, sesame seed bun, lettuce, tomato, onion, pickles",
                "allergyString" => "Gluten",
                "picture" => "productPictures/83.png",
                "business_id" => 17
            ],
            [
                "name" => "Falafel Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Falafel patty, sesame seed bun, hummus, tahini, lettuce, tomato, cucumber",
                "allergyString" => "Gluten",
                "picture" => "productPictures/84.png",
                "business_id" => 17
            ],
            [
                "name" => "Fish & Chips",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Fish, fries, tartar sauce",
                "allergyString" => "Fish, Gluten",
                "picture" => "productPictures/85.png",
                "business_id" => 17
            ],

            //! Beef & Stones Steakhouse (Business ID 18)
            [
                "name" => "Ribeye Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Ribeye steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/86.png",
                "business_id" => 18
            ],
            [
                "name" => "New York Strip Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "New York strip steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/87.png",
                "business_id" => 18
            ],
            [
                "name" => "Filet Mignon",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Filet Mignon, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/88.png",
                "business_id" => 18
            ],
            [
                "name" => "T-Bone Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "T-bone steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/89.png",
                "business_id" => 18
            ],
            [
                "name" => "Porterhouse Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Porterhouse steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/90.png",
                "business_id" => 18
            ],

            //!  Churrasqueria Portugalia (Business ID 19)
            [
                "name" => "Porco à Alentejana",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pork, clams, white wine, garlic, parsley, bay leaf, olive oil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/91.png",
                "business_id" => 19
            ],
            [
                "name" => "Bacalhau à Brás",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Salt cod, potatoes, onions, eggs, olive oil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/92.png",
                "business_id" => 19
            ],
            [
                "name" => "Francesinha",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Ham, sausage, steak, cheese, beer, bread",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/93.png",
                "business_id" => 19
            ],
            [
                "name" => "Pastel de Nata",
                "category" => "Vegetarian",
                "ingredientString" => "Custard, puff pastry",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/94.png",
                "business_id" => 19
            ],
            [
                "name" => "Azeitonas Marinadas",
                "category" => "Vegan",
                "ingredientString" => "Olives, garlic, parsley, olive oil",
                "allergyString" => "None",
                "picture" => "productPictures/95.png",
                "business_id" => 19
            ],

            //!  Churrasqueria Portugalia (Business ID 20)
            [
                "name" => "Classic Cheesesteak",
                "category" => "Vegetarian",
                "ingredientString" => "Steak, grilled onions, green peppers, cheese, on a sub roll",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/96.png",
                "business_id" => 20
            ],
            [
                "name" => "Veggie Delite",
                "category" => "Vegetarian",
                "ingredientString" => "Vegetable patty, lettuce, tomato, onion, cucumbers, on a sub roll",
                "allergyString" => "None",
                "picture" => "productPictures/97.png",
                "business_id" => 20
            ],
            [
                "name" => "Chicken Teriyaki Sub",
                "category" => "Vegetarian",
                "ingredientString" => "Grilled chicken, teriyaki sauce, lettuce, tomato, cucumber, on a sub roll",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/98.png",
                "business_id" => 20
            ],
            [
                "name" => "Black Forest Ham",
                "category" => "Vegetarian",
                "ingredientString" => "Black forest ham, lettuce, tomato, onion, pickles, on a sub roll",
                "allergyString" => "Dairy, Gluten",
                "picture" => "productPictures/99.png",
                "business_id" => 20
            ],
            [
                "name" => "Footlong",
                "category" => "Vegan",
                "ingredientString" => "12 inch sub roll",
                "allergyString" => "None",
                "picture" => "productPictures/100.png",
                "business_id" => 20
            ],
        ]);
    }
}
