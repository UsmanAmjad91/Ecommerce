<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'category_id',
        'color_id',
        'coupon_id',
        'size_id',
        'product_name',
        'brand_id',
        'model_id',
        'short_desc',
        'desc',
        'keywords',
        'technical_specification',
        'uses',
        'warranty',
        'image1',
        'image2',
        'image3',
        'image4',
        'product_status',
    ];
    
}
