<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'first_name',
        'last_name',
        'phone_number',
        'profile_photo',
        'type_user',
        
        'email',
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
    public function isActive() {
        return $this->status;
        
    }
    public function customerServices(): HasMany
    {
        return $this->hasMany(CustomerService::class,'user_id');
    }
    public function shop(): HasMany
    {
        return $this->hasMany(Shop::class,'seller_id');
    }
    public function ProfilePhoto(): HasMany
    {
        return $this->hasMany(ProfilePhoto::class,'user_id');
    }
    public function DriverInfo(): HasOne
    {
        return $this->hasOne(DriverInfo::class,'user_id');
    }
    public function order(): HasMany
    {
        return $this->hasMany(Order::class,'user_id');
    }
    public function shoppingCart(): HasOne
    {
        return $this->hasOne(shoppingCart::class,'user_id');
    }
    public function cartitem()
    {
        return $this->hasManyThrough(
            CartItem::class,
            shoppingCart::class,
            'user_id',
            'cart_id',
            'id',
            'id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class,'user_id');
    }
}
