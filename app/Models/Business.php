<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    use HasFactory;
    protected $table = 'business';

    protected $fillable = [
        "name",
        "address",
        "businessImg",
        "manager_id",
        "category_id",
        "lat",
        "lon"
    ];


    public function scopeFilter($query,array $filters){
        if(isset($filters["search"])){
            $keywords = explode(" ", $filters["search"]);

            foreach($keywords as $keyword){
                $query->orwhere('business.name', 'like', '%' . $keyword . '%')->join("category" ,"category.id" , "=" , "business.category_id")->orwhere("category.name", "=" , $keyword );
            }
        }

        if(isset($filters["category"])){
            $query->where("category_id", "=" , "$filters[category]");
        }
    }

    // realtion to products
    public function products(){
        return $this->hasMany(Product::class);
    }

    // realtion to manager
    public function manager(){
        return $this->belongsTo(User::class);
    }

    // realtion to category
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
