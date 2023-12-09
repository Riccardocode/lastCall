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

            //Restaurants in Lux City
            [
                'name' => 'Clairefontaine',
                'address' => '2 Rue de Clairefontaine, 1631 Luxembourg, Luxembourg',
                'manager_id' => 6,
                'category_id' => 2,
                "lat" => "49.61012782279831",
                "lon" => "6.132115167895016",
                "businessImg" => "/businessImages/clairFontaine.jpg"
            ],
            [
                'name' => 'Aka Cite',
                'address' => '3 Rue Genistre, 1623 Ville-Haute Luxembourg, Luxemburg',
                'manager_id' => 7,
                'category_id' => 3,
                "lat" => "49.61176170953899",
                "lon" => "6.130094997473142",
                "businessImg" => "/businessImages/akaCite.JPG"
            ],
            [
                'name' => 'Athena',
                'address' => '56 Rue Adolphe Fischer, 1520 Gare Luxembourg, Luxemburg',
                'manager_id' => 8,
                'category_id' => 4,
                "lat" => "49.60280545003395",
                "lon" => "6.12613089747277",
                "businessImg" => "/businessImages/athena.jpg"
            ],
            [
                'name' => 'Fu Lu Shou Inn',
                'address' => '56 Rue de Strasbourg, 2560 Gare Luxembourg, Luxemburg',
                'manager_id' => 9,
                'category_id' => 5,
                "lat" => "49.60054049505834",
                "lon" => "6.127713997472621",
                "businessImg" => "/businessImages/fulushouinn.jpg"
            ],
            [
                'name' => 'Radici',
                'address' => '6 Rue du Fort Niedergruenewald, 2226 Kirchberg Luxembourg, Luxemburg',
                'manager_id' => 10,
                'category_id' => 6,
                "lat" => "49.620484787344985",
                "lon" => "6.144529139801637",
                "businessImg" => "/businessImages/radici.jpg"
            ],
            [
                'name' => 'Le Sud',
                'address' => '8 Rives de Clausen, 1123 Gronn Lëtzebuerg, Luxemburg',
                'manager_id' => 11,
                'category_id' => 7,
                "lat" => "49.613107781681556",
                "lon" => "6.1427059974732146",
                "businessImg" => "/businessImages/leSud.jpg"
            ],
            [
                'name' => 'Matelots',
                'address' => '7 Rue Louvigny, 1946 Ville-Haute Luxembourg, Luxemburg',
                'manager_id' => 12,
                'category_id' => 8,
                "lat" => "49.61058432123476",
                "lon" => "6.128894539801165",
                "businessImg" => "/businessImages/matelots.jpg"
            ],
            [
                'name' => 'Basta Cosi Louvigny',
                'address' => '10 Rue Louvigny, 1946 Ville-Haute Luxembourg, Luxemburg',
                'manager_id' => 13,
                'category_id' => 9,
                "lat" => "49.61062631277745",
                "lon" => "6.128836397473123",
                "businessImg" => "/businessImages/basta.jpeg"
            ],
            [
                'name' => 'Ambrosia Restaurant',
                'address' => '10 Rue Notre Dame, 2449 Luxembourg, Luxembourg',
                'manager_id' => 14,
                'category_id' => 4,
                "lat" => "49.61005359034621",
                "lon" => "6.129310039424391",
                "businessImg" => "/businessImages/ambrosia.png"
            ],
            [
                'name' => 'Lux\'Burgers',
                'address' => '17 Rue de Bonnevoie, 1260 Gare Luxembourg, Luxemburg',
                'manager_id' => 15,
                'category_id' => 12,
                "lat" => "49.6030051016678",
                "lon" => "6.134716795886477",
                "businessImg" => "/businessImages/luxBurgers.jpg"
            ],


            //Restaurants in Esch-sur-Alzette
            [
                'name' => 'Il piccolino',
                'address' => '21 Av. de la Gare, 4734 Pétange, Luxemburg',
                'manager_id' => 16,
                'category_id' => 9,
                "lat" => "49.554764080933055",
                "lon" => "5.877010691925926",
                "businessImg" => "/businessImages/ilPiccolino.jpg"
            ],
            [
                'name' => 'Postkutsch',
                'address' => '8 Rue Xavier Brasseur, 4040 Esch-sur-Alzette, Luxemburg',
                'manager_id' => 17,
                'category_id' => 18,
                "lat" => "49.493037948137804",
                "lon" => "5.9799507638896525",
                "businessImg" => "/businessImages/postkutsch.jpg"
            ],
            [
                'name' => 'Bombay Inn',
                'address' => '8 rue Le Bataclan L, 4374 Esch an der Alzette, Luxemburg',
                'manager_id' => 18,
                'category_id' => 19,
                "lat" => "49.50255563070919",
                "lon" => "5.943837650364909",
                "businessImg" => "/businessImages/bombayinn.jpeg"
            ],
            [
                'name' => 'Pokhara',
                'address' => '39 Av. Dr Gaasch, 4818 Rodange Pétange, Luxemburg',
                'manager_id' => 19,
                'category_id' => 20,
                "lat" => "49.548705823912634",
                "lon" => "5.8429106580920305",
                "businessImg" => "/businessImages/pokhara.jpeg"
            ],
            [
                'name' => 'Antica Bari',
                'address' => '28 Rue de la Fontaine, 3470 Dudelange, Luxemburg',
                'manager_id' => 20,
                'category_id' => 9,
                "lat" => "49.47906607780153",
                "lon" => "6.081232206551255",
                "businessImg" => "/businessImages/anticaBari.jpg"
            ],
            [
                'name' => 'Loxalis',
                'address' => '150 Rue de la Libération, 3511 Dudelange, Luxemburg',
                'manager_id' => 21,
                'category_id' => 21,
                "lat" => "49.47194159976815",
                "lon" => "6.0830541353101",
                "businessImg" => "/businessImages/loxalis.jpg"
            ],
            [
                'name' => 'Cafe Coyote Belval',
                'address' => '10-12 Av. du Swing, 4367 Esch-Belval Esch-sur-Alzette, Luxemburg',
                'manager_id' => 22,
                'category_id' => 22,
                "lat" => "49.50239610085061",
                "lon" => "5.941459368290862",
                "businessImg" => "/businessImages/coyote.jpg"
            ],
            [
                'name' => 'Beef & Stones Steakhouse',
                'address' => '23 Rue du Brill, 4041 Esch-sur-Alzette, Luxemburg',
                'manager_id' => 23,
                'category_id' => 23,
                "lat" => "49.49093322814254",
                "lon" => "5.978781600163057",
                "businessImg" => "/businessImages/beff&stones.JPG"
            ],
            [
                'name' => 'Churrasqueria Portugalia',
                'address' => '10 Rue Large, 4204 Esch-sur-Alzette, Luxemburg',
                'manager_id' => 24,
                'category_id' => 24,
                "lat" => "49.49767552102095",
                "lon" => "5.980383211933216",
                "businessImg" => "/businessImages/churrasqueria.png"
            ],
            // Davids Special
            [
                'name' => 'Subway',
                'address' => '5 Rue de La Fonte, 14 Prte de France, 4364 Esch-Belval, Luxemburg',
                'manager_id' => 25,
                'category_id' => 15,
                "lat" => "49.50272742302476",
                "lon" => "5.947493108389507",
                "businessImg" => "/businessImages/subway.jpg"
            ],
        ]);
    }
}
