<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    protected $fillable = [
        'full_name',
        'card_id',
        'phone_number'
    ];

    public function sales() : HasMany{
        return $this->hasMany(Sale::class);
    }
}
