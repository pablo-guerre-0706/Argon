<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RawMaterial extends Model
{
    protected $fillable = [
        'name',
        'bar_code',
        'purchase_price',
        'weight',
        'category_mat_id',
        'brand_id',
        'unit_measure_id'
    ];

    protected $attributes = [
        'purchase_price' => '0.00',
        'weight' => '0.000'
    ];

    public function category_mat() : BelongsTo{
        return $this->belongsTo(CategoryMat::class);
    }
    public function brand() : BelongsTo{
        return $this->belongsTo(Brand::class);
    }
    public function unit_measure() : BelongsTo{
        return $this->belongsTo(UnitMeasure::class);
    }
    public function purchase_order_details() : HasMany{
        return $this->hasMany(PurchaseOrderDetail::class);
    }
    public function recipe_details() : HasMany{
        return $this->hasMany(RecipeDetail::class);
    }
    public function inventory_movements() : HasMany{
        return $this->hasMany(InventoryMovement::class);
    }
    public function inventories() : HasMany{
        return $this->hasMany(Inventory::class);
    }
}
