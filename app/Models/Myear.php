<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myear extends Model
{
    use HasFactory;
    protected $fillable = [
        'model_id',
        'year',
        'year_status',
    ];
}
