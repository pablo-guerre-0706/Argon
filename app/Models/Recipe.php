<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'preparat_instructions',
        'estimated_time_minutes',
        'oven_temperature_c'
    ];

    
    public function recipe_details() : HasMany{
        return $this->hasMany(RecipeDetail::class);
    }
    public function prod_order_details() : HasMany{
        return $this->hasMany(ProdOrderDetail::class);
    }
}
