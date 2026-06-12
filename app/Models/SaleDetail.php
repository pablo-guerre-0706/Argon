<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SaleDetail extends Model
{
    protected $fillable = [
        'quantity_sold',
        'unit_price',
        'subtotal',
        'sale_id',
        'finished_product_id',
        'unit_measure_id'
    ];

    protected $attributes = [
        'quantity_sold' => '0.000'
    ];

    public function sale() : BelongsTo{
        return $this->belongsTo(Sale::class);
    }
    public function finished_product() : BelongsTo{
        return $this->belongsTo(FinishedProduct::class);
    }
    public function unit_measure() : BelongsTo{
        return $this->belongsTo(UnitMeasure::class);
    }
    public function inventory_movements() : HasMany{
        return $this->hasMany(InventoryMovement::class);
    }
}
