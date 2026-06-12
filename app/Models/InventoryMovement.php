<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Symfony\Component\CssSelector\XPath\Extension\FunctionExtension;

class InventoryMovement extends Model
{
    protected $fillable = [
        'movement_date',
        'movement_type',
        'quantity',
        'observations',
        'user_id',
        'raw_material_id',
        'finished_product_id',
        'purchase_order_detail_id',
        'sale_detail_id',
        'prod_order_detail_id'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function raw_material() : BelongsTo{
        return $this->belongsTo(RawMaterial::class);
    }
    public function finished_product() : BelongsTo{
        return $this->belongsTo(FinishedProduct::class);
    }
    public function purchase_order_detail() : BelongsTo{
        return $this->belongsTo(PurchaseOrderDetail::class);
    }
    public function sale_detail() : BelongsTo{
        return $this->belongsTo(SaleDetail::class);
    }
    public function prod_order_detail() : BelongsTo{
        return $this->belongsTo(ProdOrderDetail::class);
    }
}
