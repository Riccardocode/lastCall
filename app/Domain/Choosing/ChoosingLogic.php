<?php

namespace App\Domain\Choosing;

use App\Models\Business;
use Illuminate\Database\Eloquent\Collection;


class ChoosingLogic{
    public static function orderBusinessesbyProximity(){
        $nearById = session()->get("nearbyBusiness");
        $all = Business::all();
        $businesses = new Collection();
        if(session()->get("nearbyBusiness") != null){
            foreach ($nearById as $key => $duration){
                $nearby = Business::find($key);
                $businesses->push($nearby);
                foreach ($all as $key => $business){
                    if($business->id == $nearby->id ){
                        $all->forget($key);
                        break;
                    }
                }
            }
            foreach($all as $business){
                $businesses->push($business);
            }
            return $businesses;
        }else{
            return  $all;
        }
    }
}