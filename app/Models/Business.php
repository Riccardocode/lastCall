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
        "manager_id",
        "category_id",
    ];

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
