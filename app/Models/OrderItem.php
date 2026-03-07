<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{protected $fillable = [
    'order_id',
    'product_id',
    'quantity',
    'price'
];

    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function product()
{
    return $this->belongsTo(Product::class);
}
}
