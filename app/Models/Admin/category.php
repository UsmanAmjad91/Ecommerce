<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'cat_id', 
        'cat_name', 
        'cat_parent_id', 
        'cat_image',
         'is_home', 
         'cat_slug',
         'status',
    ];
}
