<?php

namespace App\Domain\Choosing;

use App\Models\Business;
use App\Models\SalesLot;
use Illuminate\Database\Eloquent\Collection;


class ChoosingLogic{
    public static function orderBusinessesbyProximity(){
        $nearById = session()->get("nearbyBusiness");
        $all = Business::latest()->select("business.name", "business.category_id", "business.id", "business.businessImg","business.manager_id")->filter(request(['search',"category"]))->get();
        // dd($all);
        $businesses = new Collection();
        if(session()->get("nearbyBusiness") != null && request(["search"]) == null){
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


    public static function orderSaleslotsByProximity(){
        $nearById = session()->get("nearbyBusiness");
        $current_date = date("Y-m-d H:i:s");
        // dd($current_date);
        // $current_date = strtotime($current_date1);
        $all = SalesLot::where("end_date", ">", $current_date)->get();
        // dd($all);
        $saleslots= new Collection();
        if(session()->get("nearbyBusiness") != null){
            foreach ($nearById as $key => $duration){
                foreach($all as $key2 => $saleslot){
                    if($saleslot->product->business_id == $key){
                        $saleslots->push($saleslot);
                        $all->forget($key2);
                    }
                }
                
            }
            foreach($all as $saleslot){
                $saleslots->push($saleslot);
            }
            return $saleslots;
        }else{
            return  $all;
        }
    }
}