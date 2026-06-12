<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class UnitMeasure extends Model
{
    protected $fillable = [
        'name',
        'type',
        'abbreviation'
    ];

    public function raw_materials() : HasMany{
        return $this->hasMany(RawMaterial::class);
    }
    public function recipe_details() : HasMany{
        return $this->hasMany(RecipeDetail::class);
    }
    public function sale_details() : HasMany{
        return $this->hasMany(SaleDetail::class);
    }
}
