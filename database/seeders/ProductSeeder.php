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
            ['name' => 'Pizza Margherita', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, basil', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Pizza Capricciosa', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, ham, mushrooms, artichokes, olives', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Pepperoni Pizza', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, pepperoni', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Veggie Pizza', 'category' => "Vegan",  'ingredientString' => 'Tomato sauce, mozzarella, bell peppers, onions, olives, mushrooms', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'BBQ Chicken Pizza', 'category' => "Non-Vegetarian",  'ingredientString' => 'BBQ sauce, chicken, red onions, cilantro', 'allergyString' => 'Gluten', 'picture' => '', 'business_id' => 1],
            ['name' => 'Hawaiian Pizza', 'category' => "Vegan",  'ingredientString' => 'Tomato sauce, mozzarella, ham, pineapple', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Four Cheese Pizza', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, parmesan, gorgonzola, ricotta', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],
            ['name' => 'Meat Lover’s Pizza', 'category' => "vegetarian",  'ingredientString' => 'Tomato sauce, mozzarella, pepperoni, sausage, bacon, ham', 'allergyString' => 'Gluten, lactose', 'picture' => '', 'business_id' => 1],

            //! Cake items (Business ID 2)
            ['name' => 'Magic Cake', 'category' => "Vegan",  'ingredientString' => 'Flour, sugar, eggs, vanilla extract', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Chocolate Cake', 'category' => "vegetarian",  'ingredientString' => 'Flour, sugar, eggs, cocoa powder', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Red Velvet Cake', 'category' => "vegetarian",  'ingredientString' => 'Flour, sugar, buttermilk, cocoa powder, red food coloring', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Carrot Cake', 'category' => "Vegan",  'ingredientString' => 'Flour, sugar, carrots, eggs, spices', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],
            ['name' => 'Lemon Cake', 'category' => "Vegan",  'ingredientString' => 'Flour, sugar, eggs, lemon zest, lemon juice', 'allergyString' => 'Gluten, eggs', 'picture' => '', 'business_id' => 2],

            //! Athena Restaurant Grec (Business ID 3)
            ['name' => 'Assiette «Athena»', 'category' => "Non-Vegetarian",  'ingredientString' => 'Fillet of chicken, beef, lamb ,tzatziki, potatoes', 'allergyString' => 'Milk', 'picture' => '', 'business_id' => 3],
            ['name' => 'Gyros', 'category' => "Non-Vegetarian",  'ingredientString' => 'Pork gyros, tzatziki, sautéed potatoes', 'allergyString' => 'Milk', 'picture' => '', 'business_id' => 3],
            ['name' => 'Espadon', 'category' => "Vegan",  'ingredientString' => 'Swordfish', 'allergyString' => 'Fish, Sulfur', 'picture' => '', 'business_id' => 3],
            ['name' => 'Gemista', 'category' => "Non-Vegetarian",  'ingredientString' => 'Peppers ,tomatoes ,meat ,rice ,potatoes', 'allergyString' => 'Milk', 'picture' => '', 'business_id' => 3],
            ['name' => 'Solomos', 'category' => "Vegan",  'ingredientString' => 'salmon ,olive oil ,lemon', 'allergyString' => 'Fish, Sulfur', 'picture' => '', 'business_id' => 3],

            //! Fu Lu Shou Inn (Business ID 4)
            ['name' => 'Duck with Chinese spices and vegetables in seven colours', 'category' => "Non-Vegetarian",  'ingredientString' => 'Duck, potatoes,', 'allergyString' => 'Soy', 'picture' => '', 'business_id' => 4],
            ['name' => 'Prawns in special ‘Royal’ style', 'category' => "Vegetarian",  'ingredientString' => 'Scampi, Soy Sauce, rice, vegetables', 'allergyString' => 'Soy', 'picture' => '', 'business_id' => 4],
            ['name' => 'Stir-fried squids with vegetables', 'category' => "Vegetarian",  'ingredientString' => 'Squid, rice, tomatoes, cucumber', 'allergyString' => 'Fish, Sulfur', 'picture' => '', 'business_id' => 4],
            ['name' => 'Gemista', 'category' => "Non-Vegetarian",  'ingredientString' => 'Peppers ,tomatoes ,meat ,rice ,potatoes', 'allergyString' => 'Milk', 'picture' => '', 'business_id' => 3],
            ['name' => 'Solomos', 'category' => "Vegan",  'ingredientString' => 'salmon ,olive oil ,lemon', 'allergyString' => 'Fish, Sulfur', 'picture' => '', 'business_id' => 3],

            //! Radici (Business ID 5)
            ["name" => "Antipasto Misto", "category" => "Non-Vegetarian", "ingredientString" => "Prosciutto Crudo, Salame di Milano, Mozzarella di Bufala, Pomodori Confit, Olive Ascolane, Funghi Porcini, Gamberi Bianchi, Carpaccio di Manzo, Rucola, Aceto Balsamico Tradizionale di Modena, Olio Extra Vergine di Oliva", "allergyString" => "Dairy, Gluten, Shellfish, Tree Nuts", "picture" => "", 'business_id' => 4],
            [
                "name" => "Carpaccio di Pesce Spada",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pesce Spada, Capperi, Limone, Olio Extra Vergine di Oliva",
                "allergyString" => "Fish, Sulfites",
                "picture" => "",
                'business_id' => 5
            ],
            [
                "name" => "Tagliatelle Alla Grana",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tagliatelle, Grana Padano, Burro, Salvia",
                "allergyString" => "Dairy",
                "picture" => "",
                'business_id' => 5
            ],
            [
                "name" => "Gnocchi alla Sorrentina",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Gnocchi,Mozzarella, basil",
                "allergyString" => "Dairy",
                "picture" => "",
                'business_id' => 5
            ],
            [
                "name" => "Spaghetti Carbonara",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Guanciale, egg, pecorino",
                "allergyString" => "Dairy",
                "picture" => "",
                'business_id' => 5
            ],

            //! Le Sud (Business ID 6)
            [
                "name" => "Hummus",
                "category" => "Vegan",
                "ingredientString" => "chickpeas, tahini, olive oil, lemon juice, garlic, salt",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 6
            ],
            [
                "name" => "Baba ghanoush",
                "category" => "Vegan",
                "ingredientString" => "eggplant, tahini, lemon juice, olive oil, garlic, salt",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 6
            ],
            [
                "name" => "Shakshuka",
                "category" => "Vegan",
                "ingredientString" => "tomatoes, onions, peppers, eggs, chickpeas, spices",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 6
            ],
            [
                "name" => "Shakshuka",
                "category" => "Vegan",
                "ingredientString" => "tomatoes, onions, peppers, eggs, chickpeas, spices",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 6
            ],
            [
                "name" => "Tabouleh",
                "category" => "Vegan",
                "ingredientString" => "bulgur wheat, parsley, mint, tomatoes, lemon juice, olive oil, salt",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 6
            ],

            //! Le Sud (Business ID 7)
            [
                "name" => "Calamari Fritti",
                "category" => "Appetizers",
                "ingredientString" => "calamari, flour, breadcrumbs, olive oil, lemon, salt",
                "allergyString" => "Seafood, Gluten",
                "picture" => "https://media-cdn.tripadvisor.com/media/photo-s/16/a0/6d/45/calamari-fritti-.jpg",
                "business_id" => 7
            ],
            [
                "name" => "Mozzarella Sticks",
                "category" => "Appetizers",
                "ingredientString" => "mozzarella cheese, flour, breadcrumbs, olive oil, tomato sauce, salt",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.allrecipes.com/recipe/233246/mozzarella-sticks/",
                "business_id" => 7
            ],
            [
                "name" => "Fish & Chips",
                "category" => "Non-Vegetarian",
                "ingredientString" => "cod, flour, breadcrumbs, olive oil, vinegar, salt, potatoes",
                "allergyString" => "Seafood, Gluten",
                "picture" => "https://www.bbcgoodfood.com/recipes/11435/classic-fish-chips",
                "business_id" => 7
            ],
            [
                "name" => "Grilled Salmon",
                "category" => "Non-Vegetarian",
                "ingredientString" => "salmon, olive oil, lemon, salt, pepper",
                "allergyString" => "Fish, Sulfur",
                "picture" => "https://www.thekitchn.com/how-to-grill-salmon-302430",
                "business_id" => 7
            ],
            [
                "name" => "Creamy Tomato Soup",
                "category" => "Sides",
                "ingredientString" => "tomatoes, cream, flour, butter, salt, pepper, basil",
                "allergyString" => "Dairy",
                "picture" => "https://www.justapinch.com/recipes/soup/creamy-tomato-soup.html",
                "business_id" => 7
            ],

            //! Basta Cosi Louvigny (Business ID 8)
            [
                "name" => "Pizza Margherita",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, basil",
                "allergyString" => "Dairy",
                "picture" => "",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Marinara",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, garlic, oregano",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Capricciosa",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, ham, mushrooms, artichokes, olives",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Quattro Formaggi",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, gorgonzola cheese, parmesan cheese, fontina cheese",
                "allergyString" => "Dairy",
                "picture" => "",
                "business_id" => 8
            ],
            [
                "name" => "Pizza Prosciutto e Funghi",
                "category" => "Non-Vegetarian",
                "ingredientString" => "tomato sauce, mozzarella cheese, prosciutto ham, mushrooms",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 8
            ],

            //! Ambrosia Restaurant (Business ID 9)
            [
                "name" => "Gnocchi Caprese",
                "category" => "Vegan",
                "ingredientString" => "gnocchi, tomato sauce, mozzarella cheese, basil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 9
            ],
            [
                "name" => "Penne Arrabiata",
                "category" => "Vegan",
                "ingredientString" => "penne pasta, tomato sauce, chili flakes, garlic, olive oil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 9
            ],
            [
                "name" => "Lasagna Classica",
                "category" => "Non-Vegetarian",
                "ingredientString" => "lasagna noodles, meat sauce, béchamel sauce, parmesan cheese, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 9
            ],
            [
                "name" => "Pollo Parmigiana",
                "category" => "Non-Vegetarian",
                "ingredientString" => "chicken breast, breadcrumbs, marinara sauce, mozzarella cheese, basil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 9
            ],
            [
                "name" => "Tiramisu",
                "category" => "Dessert",
                "ingredientString" => "ladyfingers, espresso, mascarpone cheese, cocoa powder, sugar",
                "allergyString" => "Dairy",
                "picture" => "",
                "business_id" => 9
            ],

            //! Lux'Burgers (Business ID 10)
            [
                "name" => "Classic Cheeseburger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Beef patty, sesame seed bun, lettuce, tomato, onion, pickles, cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.tripadvisor.com/LocationPhotoDirectLink-g189592-d1065256-i153010427-Lux-Burgers-Luxembourg.jpg",
                "business_id" => 10
            ],
            [
                "name" => "Double Cheeseburger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Two beef patties, sesame seed bun, lettuce, tomato, onion, pickles, cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://media-cdn.tripadvisor.com/media/photo-s/16/a0/6d/45/double-cheeseburger.jpg",
                "business_id" => 10
            ],
            [
                "name" => "Grilled Chicken Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Grilled chicken patty, sesame seed bun, lettuce, tomato, onion, pickles",
                "allergyString" => "Gluten",
                "picture" => "https://cdn.pixabay.com/photo/2015/02/15/14/51/grilled-chicken-burger-657444_1280.jpg",
                "business_id" => 10
            ],
            [
                "name" => "Veggie Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Black bean patty, sesame seed bun, lettuce, tomato, onion, pickles",
                "allergyString" => "None",
                "picture" => "https://www.tasteofhome.com/recipes/vegetarian-black-bean-burgers/",
                "business_id" => 10
            ],
            [
                "name" => "Falafel Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Falafel patty, sesame seed bun, hummus, tahini, lettuce, tomato, onion",
                "allergyString" => "Gluten",
                "picture" => "https://www.thespruceeats.com/falafel-burgers-3378279",
                "business_id" => 10
            ],

            //! il piccolino (Business ID 11)
            [
                "name" => "Pasta al Limone",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, lemon juice, olive oil, butter, salt, pepper",
                "allergyString" => "Dairy",
                "picture" => "https://www.simplyrecipes.com/wp-content/uploads/2018/02/lemon-pasta-2-2.jpg",
                "business_id" => 11
            ],
            [
                "name" => "Tagliatelle al Ragu",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, meat sauce, parmesan cheese, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.seriouseats.com/images/2016/09/20160915-pasta-dishes-best-ever-alligator-farfalle.jpg",
                "business_id" => 11
            ],
            [
                "name" => "Frutti di Mare",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, shrimp, mussels, clams, white wine, garlic, parsley, salt, pepper",
                "allergyString" => "Shellfish, Dairy, Gluten",
                "picture" => "https://www.bonappetit.com/recipe/linguine-with-shrimp-mussels-and-clams",
                "business_id" => 11
            ],
            [
                "name" => "Pizza Margherita",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tomato sauce, mozzarella cheese, basil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.pizzatoday.com/recipes/the-original-pizza-margherita/",
                "business_id" => 11
            ],
            [
                "name" => "Insalata Caprese",
                "category" => "Vegan",
                "ingredientString" => "Mozzarella cheese, tomatoes, basil, olive oil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.giallozafferano.it/en/recipes/salads/insalata-caprese/",
                "business_id" => 11
            ],

            //! Postkutsch (Business ID 12)
            [
                "name" => "Käsefondue",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Gruyère cheese, Emmental cheese, white wine, garlic, kirsch, bread",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.allrecipes.com/recipe/23035/classic-swiss-cheese-fondue/",
                "business_id" => 12
            ],
            [
                "name" => "Raclette",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Raclette cheese, potatoes, onions, pickles, cornichons, gherkins, mustard, bread",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.bbcgoodfood.com/recipes/raclette-with-potatoes-and-pickles",
                "business_id" => 12
            ],
            [
                "name" => "Tiramisu",
                "category" => "Vegetarian",
                "ingredientString" => "Ladyfingers, espresso, mascarpone cheese, cocoa powder, sugar",
                "allergyString" => "Dairy",
                "picture" => "https://www.allrecipes.com/recipe/23035/classic-swiss-cheese-fondue/",
                "business_id" => 12
            ],
            [
                "name" => "Apfelstrudel",
                "category" => "Vegetarian",
                "ingredientString" => "Strudel dough, apples, cinnamon, sugar, raisins, walnuts, butter, apricot jam",
                "allergyString" => "Gluten, Dairy",
                "picture" => "https://www.allrecipes.com/recipe/23035/classic-swiss-cheese-fondue/",
                "business_id" => 12
            ],
            [
                "name" => "Zopf",
                "category" => "Breads",
                "ingredientString" => "Flour, yeast, milk, sugar, eggs, butter, salt",
                "allergyString" => "Gluten",
                "picture" => "https://www.allrecipes.com/recipe/23035/classic-swiss-cheese-fondue/",
                "business_id" => 12
            ],

            //! Bombay Inn (Business ID 13)
            [
                "name" => "Chicken Tikka Masala",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Chicken, tomato puree, cream, spices, garlic, ginger, garam masala",
                "allergyString" => "Dairy, Gluten",
                "picture" => "https://www.bbcgoodfood.com/recipes/chicken-tikka-masala",
                "business_id" => 13
            ],
            [
                "name" => "Samosas",
                "category" => "Vegan",
                "ingredientString" => "Pastry, potatoes, peas, onions, spices, tamarind chutney",
                "allergyString" => "Gluten",
                "picture" => "https://www.delish.com/cooking/recipe-ideas/a24143134/chicken-samosas/",
                "business_id" => 13
            ],
            [
                "name" => "Naan Bread",
                "category" => "Accompaniments",
                "ingredientString" => "Flour, yeast, milk, butter, sugar, salt",
                "allergyString" => "Gluten",
                "picture" => "https://www.allrecipes.com/recipe/25629/naan-bread/",
                "business_id" => 13
            ],
            [
                "name" => "Gajar Halwa",
                "category" => "Vegetarian",
                "ingredientString" => "Carrot, butter, milk, cream, sugar, nuts, spices",
                "allergyString" => "Milk, Dairy",
                "picture" => "https://www.indianhealthyrecipes.com/gajar-halwa-recipe/",
                "business_id" => 13
            ],
            [
                "name" => "Lassi",
                "category" => "Drinks",
                "ingredientString" => "Yogurt, water, sugar, flavorings",
                "allergyString" => "Dairy, Milk",
                "picture" => "https://www.foodnetwork.com/recipes/aarti-sequeira/mango-lassi-recipe-2102830",
                "business_id" => 13
            ],

            //! Pokhara (Business ID 14)
            [
                "name" => "Dal Bhat",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Lentils, rice, spices",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 14
            ],
            [
                "name" => "Chicken Momo",
                "category" => "Vegan",
                "ingredientString" => "Chicken, dough, spices, vegetables",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 14
            ],
            [
                "name" => "Vegetable Curry",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Vegetables, spices, coconut milk",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 14
            ],
            [
                "name" => "Papadum",
                "category" => "Vegan",
                "ingredientString" => "Lentil flour, spices",
                "allergyString" => "Gluten",
                "picture" => "",
                "business_id" => 14
            ],
            [
                "name" => "Papadum",
                "category" => "Vegan",
                "ingredientString" => "Lentil flour, spices",
                "allergyString" => "Gluten",
                "picture" => "",
                "business_id" => 14
            ],

            //! Antica Bari (Business ID 15)
            [
                "name" => "Margherita",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tomato sauce, mozzarella cheese, basil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 15
            ],
            [
                "name" => "Pizza Marinara",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Tomato sauce, garlic, oregano",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 15
            ],
            [
                "name" => "Penne Arrabbiata",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Penne pasta, tomato sauce, chili flakes, garlic, olive oil, salt, pepper",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 15
            ],
            [
                "name" => "Frutti di Mare",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pasta, shrimp, mussels, clams, tomato sauce, white wine, garlic, parsley",
                "allergyString" => "Shellfish, Dairy, Gluten",
                "picture" => "",
                "business_id" => 15
            ],
            [
                "name" => "Tiramisu",
                "category" => "Vegetarian",
                "ingredientString" => "Ladyfingers, espresso, mascarpone cheese, cocoa powder, sugar",
                "allergyString" => "Dairy",
                "picture" => "",
                "business_id" => 15
            ],

            //! Loxalis (Business ID 16)
            [
                "name" => "Salmon Salad",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Salmon, lettuce, tomato, cucumber, dill, lemon",
                "allergyString" => "Fish, Sulfur",
                "picture" => "",
                "business_id" => 16
            ],
            [
                "name" => "Falafel Wrap",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Falafel, hummus, tahini, lettuce, tomato, cucumber",
                "allergyString" => "Gluten",
                "picture" => "",
                "business_id" => 16
            ],
            [
                "name" => "Hummus Plate",
                "category" => "Vegan",
                "ingredientString" => "Hummus, pita bread, olive oil, parsley",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 16
            ],
            [
                "name" => "Shawarma",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Shawarma meat, hummus, tahini, lettuce, tomato, cucumber",
                "allergyString" => "Gluten",
                "picture" => "",
                "business_id" => 16
            ],
            [
                "name" => "Baklava",
                "category" => "Vegetarian",
                "ingredientString" => "Phyllo dough, nuts, honey, syrup",
                "allergyString" => "Gluten",
                "picture" => "",
                "business_id" => 16
            ],

            //! Cafe Coyote Belval (Business ID 17)
            [
                "name" => "Classic Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Beef patty, sesame seed bun, lettuce, tomato, onion, pickles, cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 17
            ],
            [
                "name" => "Double Cheeseburger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Two beef patties, sesame seed bun, lettuce, tomato, onion, pickles, two cheese",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 17
            ],
            [
                "name" => "Grilled Chicken Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Grilled chicken patty, sesame seed bun, lettuce, tomato, onion, pickles",
                "allergyString" => "Gluten",
                "picture" => "",
                "business_id" => 17
            ],
            [
                "name" => "Falafel Burger",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Falafel patty, sesame seed bun, hummus, tahini, lettuce, tomato, cucumber",
                "allergyString" => "Gluten",
                "picture" => "",
                "business_id" => 17
            ],
            [
                "name" => "Fish & Chips",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Fish, fries, tartar sauce",
                "allergyString" => "Fish, Gluten",
                "picture" => "",
                "business_id" => 17
            ],

            //! Beef & Stones Steakhouse (Business ID 18)
            [
                "name" => "Ribeye Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Ribeye steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 18
            ],
            [
                "name" => "New York Strip Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "New York strip steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 18
            ],
            [
                "name" => "Filet Mignon",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Filet Mignon, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 18
            ],
            [
                "name" => "T-Bone Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "T-bone steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 18
            ],
            [
                "name" => "Porterhouse Steak",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Porterhouse steak, fries, béarnaise sauce",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 18
            ],

            //!  Churrasqueria Portugalia (Business ID 19)
            [
                "name" => "Carne de Porco à Alentejana",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Pork, clams, white wine, garlic, parsley, bay leaf, olive oil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 19
            ],
            [
                "name" => "Bacalhau à Brás",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Salt cod, potatoes, onions, eggs, olive oil",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 19
            ],
            [
                "name" => "Francesinha",
                "category" => "Non-Vegetarian",
                "ingredientString" => "Ham, sausage, steak, cheese, beer, bread",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 19
            ],
            [
                "name" => "Pastel de Nata",
                "category" => "Vegetarian",
                "ingredientString" => "Custard, puff pastry",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 19
            ],
            [
                "name" => "Azeitonas Marinadas",
                "category" => "Vegan",
                "ingredientString" => "Olives, garlic, parsley, olive oil",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 19
            ],

            //!  Churrasqueria Portugalia (Business ID 19)
            [
                "name" => "Classic Cheesesteak",
                "category" => "Vegetarian",
                "ingredientString" => "Steak, grilled onions, green peppers, cheese, on a sub roll",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 20
            ],
            [
                "name" => "Veggie Delite",
                "category" => "Vegetarian",
                "ingredientString" => "Vegetable patty, lettuce, tomato, onion, cucumbers, on a sub roll",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 20
            ],
            [
                "name" => "Chicken Teriyaki Sub",
                "category" => "Vegetarian",
                "ingredientString" => "Grilled chicken, teriyaki sauce, lettuce, tomato, cucumber, on a sub roll",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 20
            ],
            [
                "name" => "Black Forest Ham",
                "category" => "Vegetarian",
                "ingredientString" => "Black forest ham, lettuce, tomato, onion, pickles, on a sub roll",
                "allergyString" => "Dairy, Gluten",
                "picture" => "",
                "business_id" => 20
            ],
            [
                "name" => "Footlong",
                "category" => "Vegan",
                "ingredientString" => "12 inch sub roll",
                "allergyString" => "None",
                "picture" => "",
                "business_id" => 20
            ],
        ]);
    }
}
