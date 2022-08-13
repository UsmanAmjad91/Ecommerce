<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = [
        'banner_id',
        'banner_image',
        'btn_text',
        'btn_link',
        'banner_status',
    ];
}
