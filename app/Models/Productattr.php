<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productattr extends Model
{
    use HasFactory;
    protected $fillable = [
        'patrr_id',
        'products_id',
        'sku',
        'imageatrr',
        'price',
        
    ];
}
