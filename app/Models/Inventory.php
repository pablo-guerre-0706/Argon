<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Inventory extends Model
{
    protected $fillable = [
        'real_stock',
        'max_stock',
        'min_stock',
        'raw_material_id',
        'finished_product_id'
    ];

    protected $attributes = [
        'real_stock' => '0.000',
        'max_stock' => '0.000',
        'min_stock' => '0.000'
    ];

    public function raw_material() : BelongsTo{
        return $this->belongsTo(RawMaterial::class);
    }
    public function finished_product() : BelongsTo{
        return $this->belongsTo(FinishProduct::class);
    }
}
