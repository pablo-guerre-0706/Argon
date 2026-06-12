<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CategoryMat extends Model
{
    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    protected $attributes = [
        'status' => 'active'
    ];

    public function raw_materials() : HasMany{
        return $this->hasMany(RawMaterial::class);
    }
}
