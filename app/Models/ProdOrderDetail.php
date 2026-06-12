<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProdOrderDetail extends Model
{
    protected $fillable = [
        'required_mat_quantity',
        'dispatched_mat_quantity',
        'scheduled_quantity',
        'quantity_produced',
        'loss_quantity',
        'bake_number',
        'status',
        'production_order_id',
        'recipe_id',
        'finished_product_id'
    ];

    protected $attributes = [
        'status' => 'pending'
    ];
    
    public function production_order() : BelongsTo{
        return $this->belongsTo(ProductionOrder::class);
    }
    public function recipe() : BelongsTo{
        return $this->belongsTo(Recipe::class);
    }
    public function finished_product() : BelongsTo{
        return $this->belongsTo(FinishedProduct::class);
    }
    public function inventory_movements() : HasMany{
        return $this->hasMany(InventoryMovement::class);
    }
}
