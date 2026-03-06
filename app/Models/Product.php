<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    'name',
    'category_id',
    'description',
    'product_type',
    'original_price',
    'discount_price',
    'sku',
    'quantity'
];

public function category()
{
    return $this->belongsTo(Category::class);
}

public function images()
{
    return $this->hasMany(ProductImage::class);
}

public function attributeValues()
{
    return $this->belongsToMany(
        AttributeValue::class,
        'product_attribute_values',
        'product_id',
        'attribute_value_id'
    )->withPivot('attribute_id');
}


public function cartItems()
{
    return $this->hasMany(CartItem::class);
}

}
