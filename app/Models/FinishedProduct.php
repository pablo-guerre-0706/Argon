<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FinishedProduct extends Model
{
    protected $fillable = [
        'name_bread',
        'description',
        'sale_price'
    ];

    protected $attributes = [
        'sale_price' => '0.00'
    ];
    public function prod_order_details() : HasMany{
        return $this->hasMany(ProdOrderDetail::class);
    }
    public function sale_details() : HasMany{
        return $this->hasMany(SaleDetail::class);
    }
    public function inventory_movements() : HasMany{
        return $this->hasMany(InventoryMovement::class);
    }
    public function inventories() : HasMany{
        return $this->hasMany(Inventory::class);
    }
}
