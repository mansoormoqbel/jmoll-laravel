<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ShopValidity extends Model
{
    use HasFactory;
    protected $table = 'shop_validity';
    protected $fillable = [
        'body', 'shop_id'
    ];

    // Inverse One-to-One relationship with Shop
    public function shop()
    {
        return $this->belongsTo(Shop::class,'shop_id');
    }

    // One-to-Many relationship with ShopValidityDocs
    public function docs()
    {
        return $this->hasMany(ShopValidityDocs::class, 'validity_id');
    }
}
