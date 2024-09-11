<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShoppingCart extends Model
{
    use HasFactory;
    protected $table = 'shopping_carts';
    protected $fillable = [
       'user_id', 'name'
    ];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function cartItems()
    {
        return $this->hasMany(CartItem::class,'cart_id');
    }
}
