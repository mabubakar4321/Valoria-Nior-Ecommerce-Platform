<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
    'product_id',
    'image',
];
public function images(){
    return $this->hasMany(ProductImage::class);
}
}
