<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CustomerService extends Model
{
    use HasFactory;
    protected $table = 'customer_services';
    protected $fillable = [
        'subject',
        'body',
        'user_id',
       
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
