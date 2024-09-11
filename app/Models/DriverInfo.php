<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DriverInfo extends Model
{
    use HasFactory;
    protected $table = 'driver_infos';
    protected $fillable = [
        'user_id', 'car_model', 'car_make', 'birth_date', 'car_year_made', 
        'car_number', 'car_color', 'personal_identity_file', 'driving_license_file', 
        'car_license_file', 'availability', 'acception'
    ];
    public function user() {
        return $this->belongsTo(User::class,'user_id');
    }
    public function order(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
