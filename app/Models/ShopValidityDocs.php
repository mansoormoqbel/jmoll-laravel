<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ShopValidityDocs extends Model
{
    use HasFactory;
    protected $table = 'shop_validity_docs';
    protected $fillable = [
        'filename', 'validity_id'
    ];

    // Inverse One-to-Many relationship with ShopValidity
    public function validity()
    {
        return $this->belongsTo(ShopValidity::class, 'validity_id');
    }
}
