<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PurchaseOrder extends Model
{
    protected $fillable = [
        'date_order',
        'order_number',
        'subtotal',
        'tax',
        'total',
        'status_order',
        'user_id',
        'supplier_id'
    ];

    protected $attributes = [
        'subtotal' => '0.00',
        'tax' => '0.00',
        'total' => '0.00',
        'status_order' => 'generated'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function supplier() : BelongsTo{
        return $this->belongsTo(Supplier::class);
    }
    public function purchase_order_details() : HasMany{
        return $this->hasMany(PurchaseOrderDetail::class);
    }
}
