<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = [
        'main_category',
        'sub_category',
        'brand',
       
    ];
    public function shop(): HasMany
    {
        return $this->hasMany(Shop::class,'catg_id');
    }
    public function product(): HasMany
    {
        return $this->hasMany(Product::class,'catg_id');
    }
   
}
