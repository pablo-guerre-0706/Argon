<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    protected $fillable = [
        'sale_number',
        'sale_date',
        'total_to_pay',
        'user_id',
        'customer_id'
    ];

    protected $attributes = [
        'total_to_pay' => '0.00'
    ];

    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
    public function customer() : BelongsTo{
        return $this->belongsTo(Customer::class);
    }
    public function sale_details() : HasMany{
        return $this->hasMany(SaleDetail::class);
    }
}
