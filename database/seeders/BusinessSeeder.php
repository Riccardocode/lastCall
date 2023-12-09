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
                'name' => 'Restaurant Cyrano',
                'address' => '22 Rue du Laboratoire, 2335 Luxembourg, Luxembourg',
                'manager_id' => 16,
                'category_id' => 1,
                "lat" => "49.60370085499415",
                "lon" => "6.1369305390586595"
            ],
            [
                'name' => 'Ambrosia Restaurant',
                'address' => '10 Rue Notre Dame, 2449 Luxembourg, Luxembourg',
                'manager_id' => 17,
                'category_id' => 1,
                "lat" => "49.610203957577625",
                "lon" => "6.1292884390590645"
            ],
            [
                'name' => 'L\' Annexe',
                'address' => '7 Rue du St Esprit, 2080 Luxembourg, Luxembourg',
                'manager_id' => 18,
                'category_id' => 2,
                "lat" => "49.608626813760395",
                "lon" => "6.133550281387053"
            ],
            [
                'name' => 'Clairefontaine',
                'address' => '2 Rue de Clairefontaine, 1631 Luxembourg, Luxembourg',
                'manager_id' => 20,
                'category_id' => 3,
                "lat" => "49.61012782279831",
                "lon" => "6.132115167895016"
            ],
            [
                'name' => 'Restaurant Um Plateau',
                'address' => '19 Rue du Brill, 4435 Esch-sur-Alzette, Luxembourg',
                'manager_id' => 21,
                'category_id' => 3,
                "lat" =>"49.469700",
                "lon" => "5.994700"
            ],
            [
                'name' => 'Brasserie du Parc',
                'address' => '3 Rue du Parc, 4435 Esch-sur-Alzette, Luxembourg',
                'manager_id' => 22,
                'category_id' => 3,
                "lat" =>"49.469500",
                "lon" =>"5.997200"
            ],
            [
                'name' => 'La Table d\'Adrien',
                'address' => '7 Rue du Brill, 4435 Esch-sur-Alzette, Luxembourg',
                'manager_id' => 23,
                'category_id' => 3,
                "lat" => "49.469800",
                "lon" =>"5.994800"
            ],
            [
                'name' => 'Restaurant Le Chapiteau',
                'address' => '16 Avenue de la Libération, 4435 Esch-sur-Alzette, Luxembourg',
                'manager_id' => 24,
                'category_id' => 3,
                "lat" => "49.474200",
                "lon" =>"5.995300"
            ],
           
        ]);
    }
}
