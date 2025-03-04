<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'brand_id', 'category_id', 'price', 'model_year', 'mileage',
        'transmission', 'fuel_type', 'color', 'description', 'stock','car_id', 'engine', 'horsepower', 'torque', 'fuel_capacity',
        'dimensions', 'weight', 'warranty', 'features'
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function images()
    {
        return $this->hasMany(CarImage::class, 'car_id');
    }
    public function carDetail()
    {
        return $this->hasOne(CarDetail::class, 'car_id');
    }
   
}

