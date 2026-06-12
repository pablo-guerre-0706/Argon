<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class RecipeDetail extends Model
{
    protected $fillable = [
        'ingredient_quantity',
        'unit_measure_recipe',
        'recipe_id',
        'raw_material_id',
        'unit_measure_id'
    ];

    protected $attributes = [
        'ingredient_quantity' => '0.000'
    ];

    public function recipe() : BelongsTo{
        return $this->belongsTo(Recipe::class);
    }
    public function raw_material() : BelongsTo{
        return $this->belongsTo(RawMaterial::class);
    }
    public function unit_measure() : BelongsTo{
        return $this->belongsTo(UnitMeasure::class);
    }
}
