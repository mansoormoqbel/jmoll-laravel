<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
     /*name,description,activation,price,country_made,quantity,status,created_date,shop_id,catg_id, */
    protected $fillable = [
        'name',
        'description',
        'activation',
        'price',
        'country_made',
        'quantity',
        'status',
        'created_date',
        'shop_id',
        'catg_id',
    ];
    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class,'catg_id');
    }
    public function productphoto(): HasMany
    {
        return $this->hasMany(ProductPhoto::class,'product_id');
    }
    public function comments(): HasMany
    {
        return $this->hasMany(Comments::class,'product_id');
    }
    public function cartItem()
    {
        return $this->hasMany(CartItem::class,'product_id');
    }
    public function orderItem()
    {
        return $this->hasMany(orderItem::class,'product_id');
    }
}
