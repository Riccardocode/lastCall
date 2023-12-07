<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';

    protected $fillable = [
        "name",
        "category",
        "ingredientString",
        "allergyString",
        "picture",
        "business_id"
    ];

    public function saleslots(){
        return $this->hasMany(SalesLot::class, "product_id", "id");
    }
    public function business(){
        return $this->belongsTo(Business::class);
    }
}
