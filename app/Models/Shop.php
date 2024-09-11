<?php

namespace App\Models;
/* use  App\Models\Shop; */
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Shop extends Model
{
    use HasFactory;
    protected $table = 'shops';
    protected $fillable = [
       'name', 'Field', 'latitude', 'longitude', 'city', 'address', 
        'phone_number', 'acception', 'created_date', 'seller_id', 'catg_id'
    ];
    public function category() {
        return $this->belongsTo(Category::class,'catg_id');
    }
    public function user() {
        return $this->belongsTo(User::class,'seller_id');
    }
    public function validity()
    {
        return $this->hasOne(ShopValidity::class,'shop_id');
    }

    // One-to-Many relationship with ShopValidityDocs through ShopValidity
    public function validityDocs()
    {
        return $this->hasManyThrough(ShopValidityDocs::class, ShopValidity::class,'shop_id','validity_id','id','id');
    }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class,'shop_id');
    }

}
