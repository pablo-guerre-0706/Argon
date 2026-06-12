<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'profile_image',
        'email',
        'card_id',
        'phone_number',
        'address',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function image(): string
    {
        if ($this->profile_image) {
            return asset('storage/' . $this->profile_image);
        } else {
            return asset('img/theme/user.png');
        }
    }

    public function purchase_orders() : HasMany{
        return $this->hasMany(PurchaseOrder::class);
    }
    public function production_orders() : HasMany{
        return $this->hasMany(ProductionOrder::class);
    }
    public function sales() : HasMany{
        return $this->hasMany(Sale::class);
    }
    public function inventory_movements() : HasMany{
        return $this->hasMany(InventoryMovement::class);
    }
}
