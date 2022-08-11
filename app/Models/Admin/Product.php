<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_id',
        'category',
        'color',
        'coupon',
        'size',
        'product_name',
        'brand',
        'model',
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
