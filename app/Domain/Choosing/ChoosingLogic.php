<?php

namespace App\Domain\Choosing;

use App\Models\Business;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Request;

class ChoosingLogic{
    public static function orderBusinessesbyProximity($perPage = 10, $page = null, $options = []){
        $page = $page ?: (LengthAwarePaginator::resolveCurrentPage() ?: 1);
        $nearById = session()->get("nearbyBusiness");
        $all = Business::all();
        $businesses = new Collection();
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
        $businesses = $businesses->forPage($page, $perPage);
        return new LengthAwarePaginator(
            $businesses,
            count($all), 
            $perPage, 
            $page, 
            $options
        );
    }
}