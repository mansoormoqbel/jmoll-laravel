<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class CartItem extends Model
{
    use HasFactory;
    protected $table = 'cart_items';
    protected $fillable = [
       'product_id', 'cart_id','quantity','added_date'
    ];
    public function shoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class,'cart_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id'); // Assuming you have a Product model
    }
    public function photoproduct()
    {
        return $this->hasManyThrough(ProductPhoto::class, Product::class, 'product_id','product_id','id','id');
    }
}
