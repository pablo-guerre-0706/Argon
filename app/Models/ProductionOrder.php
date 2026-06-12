<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductionOrder extends Model
{
    protected $fillable = [
        'date_order',
        'order_number',
        'start_date',
        'end_date',
        'status',
        'user_id'
    ];

    protected $attributes = [
        'status' => 'draft'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function prod_order_details() : HasMany{
        return $this->hasMany(ProdOrderDetail::class);
    }
}
