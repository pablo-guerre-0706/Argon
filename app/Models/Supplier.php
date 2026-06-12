<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Supplier extends Model
{
    protected $fillable = [
        'name',
        'status',
        'address',
        'phone_number',
        'email'
    ];

    protected $attributes = [
        'status' => 'active'
    ];

    public function purchase_orders() : HasMany{
        return $this->hasMany(PurchaseOrder::class);
    }
}
