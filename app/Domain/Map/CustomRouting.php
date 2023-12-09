<?php

namespace App\Domain\Map;

use App\Domain\Map\CustomMap;
use Illuminate\Support\Facades\Http;

class CustomRouting{
    public static function filterByAddress(string $address, $businesses){
        $coords = CustomMap::addressToCoords($address);
        $lat1 = $coords[0]["lat"];
        $lon1 = $coords[0]["lon"];
        $userCoords = [
            "lat" => $lat1,
            "lon" => $lon1
        ];
        session()->put("userCoords",$userCoords);
        foreach($businesses as $key => $business){
            if(CustomRouting::haversineDistance($lat1,$lon1,$business->lat,$business->lon)>=2){
                $businesses->forget($key);
                //unset($businesses[$key]);
            }
        }

        return $businesses;
    }

    public static function walkingTime($businesses ,$address = "none"){
        if($address = "none"){
            $lat1 = session()->get("userCoords")["lat"];
            $lon1 = session()->get("userCoords")["lon"];
        }
        else{
            $coords = CustomMap::addressToCoords($address);
            $lat1 = $coords[0]["lat"];
            $lon1 = $coords[0]["lon"];
        }
        

        $nearbyBusiness = [];

        foreach($businesses as $business){
            if(($lat1!= $business->lat)&&($lon1 != $business->lon)){
                $geoData = Http::get("http://localhost:8080/ors/v2/directions/foot-walking?start=$lon1,$lat1&end=$business->lon,$business->lat")->json();
                $nearbyBusiness[$business->id] = ["duration" => $geoData["features"][0]["properties"]["summary"]["duration"]];
            }
        }
        asort($nearbyBusiness);
        session()->put("nearbyBusiness",$nearbyBusiness);
    }

    public static function haversineDistance($lat1, $lon1, $lat2, $lon2) {
        $earthRadius = 6371; // Earth radius in kilometers
      
        $lat1 = deg2rad($lat1);
        $lon1 = deg2rad($lon1);
        $lat2 = deg2rad($lat2);
        $lon2 = deg2rad($lon2);
      
        $deltaLat = $lat2 - $lat1;
        $deltaLon = $lon2 - $lon1;
      
        $a = sin($deltaLat / 2) * sin($deltaLat / 2) +
              cos($lat1) * cos($lat2) *
              sin($deltaLon / 2) * sin($deltaLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
      
        $distance = $earthRadius * $c;
      
        return $distance;
    }
      
      
}