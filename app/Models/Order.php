<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
     /*name,description,activation,price,country_made,quantity,status,created_date,shop_id,catg_id, */
    protected $fillable = [
        'user_id',
        'latitude',
        'longitude',
        'city',
        'address',
        'phone_number',
        'total_price_products',
        'total_amount',
        'delivery_price',
        'number_product',
        'order_status',
        'date',
        'driver_id',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function driverinfo(): BelongsTo
    {
        return $this->belongsTo(DriverInfo::class,'driver_id');
    }
    public function orderItem()
    {
        return $this->hasMany(orderItem::class,'order_id');
    }
}
