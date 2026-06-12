<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrderDetail extends Model
{
    protected $fillable = [
        'ordered_quantity',
        'unit_cost',
        'subtotal',
        'purchase_order_id',
        'raw_material_id'
    ];
    
    protected $attributes = [
        'ordered_quantity' => '0.000',
        'unit_cost' => '0.00',
        'subtotal' => '0.00'
    ];


    public function purchase_order() : BelongsTo{
        return $this->belongsTo(PurchaseOrder::class);
    }
    public function raw_material() : BelongsTo{
        return $this->belongsTo(RawMaterial::class);
    }
    public function inventory_movements() : HasMany{
        return $this->hasMany(InventoryMovement::class);
    }
}
