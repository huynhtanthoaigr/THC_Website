<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id', 'car_id', 'quantity', 'price'
    ];

    // Mối quan hệ với Order
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    // Mối quan hệ với Car (giả sử có model Car)
    public function car()
    {
        return $this->belongsTo(Car::class, 'car_id');
    }
}
