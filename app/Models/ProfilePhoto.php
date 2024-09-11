<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilePhoto extends Model
{
    use HasFactory;
    protected $table = 'profile_photos';
    protected $fillable = [
        'photo_name',
    
        'user_id',
       
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
