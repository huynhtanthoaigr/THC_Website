<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CarDetail extends Model
{
    // Nếu cần thiết, thêm thuộc tính $fillable, $table, v.v.
    protected $fillable = [
        'car_id',
        'engine',
        'horsepower',
        'torque',
        'fuel_capacity',
        'dimensions',
        'weight',
        'warranty',
        'features'
    ];

    // Quan hệ với Car (nếu có)
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
