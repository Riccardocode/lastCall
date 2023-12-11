<?php

namespace App\Http\Controllers;

use App\Models\Business;
use Illuminate\Http\Request;
use App\Domain\Map\CustomMap;
use App\Domain\Map\CustomRouting;
use Illuminate\Support\Facades\Http;

class BotApiController extends Controller
{
    protected $userCoords = [];
    public function proximity(Request $request){
        $address = $request->validate([
            "address" => "required"
        ]);
        $businesses = CustomRouting::filterByAddress($address["address"],Business::all());
        CustomRouting::walkingTime($businesses);
    }

    // public function filterByAddress(string $address, $businesses){
        
    //     $coords = CustomMap::addressToCoords($address);
    //     $lat1 = $coords[0]["lat"];
    //     $lon1 = $coords[0]["lon"];
    //     $userCoords = [
    //         "lat" => $lat1,
    //         "lon" => $lon1
    //     ];
    //     $this->userCoords = $userCoords;
    //     foreach($businesses as $key => $business){
    //         if(CustomRouting::haversineDistance($lat1,$lon1,$business->lat,$business->lon)>=2){
    //             $businesses->forget($key);
    //             //unset($businesses[$key]);
    //         }
    //     }

    //     return $businesses;
    // }

    // public function walkingTime($businesses ,$address = "none"){
    //     dd($this->userCoords);
    //     if($address = "none"){
    //         $lat1 = session()->get("userCoords")["lat"];
    //         $lon1 = session()->get("userCoords")["lon"];
    //     }
    //     else{
    //         $coords = CustomMap::addressToCoords($address);
    //         $lat1 = $coords[0]["lat"];
    //         $lon1 = $coords[0]["lon"];
    //     }
        

    //     $nearbyBusiness = [];

    //     foreach($businesses as $business){
    //         if(($lat1!= $business->lat)&&($lon1 != $business->lon)){
    //             $geoData = Http::get("http://localhost:8080/ors/v2/directions/foot-walking?start=$lon1,$lat1&end=$business->lon,$business->lat")->json();
    //             $nearbyBusiness[$business->id] = ["duration" => $geoData["features"][0]["properties"]["summary"]["duration"]];
    //         }
    //     }
    //     asort($nearbyBusiness);
    //     session()->put("nearbyBusiness",$nearbyBusiness);
    // }
}
