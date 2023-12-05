<?php

namespace App\Domain\Map;

use Illuminate\Support\Facades\Http;

class CustomMap{

   public static function addressToCoords(string $address){
      return Http::get("https://geocode.maps.co/search?q=$address");
      
   }
}
