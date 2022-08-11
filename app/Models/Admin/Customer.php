<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_id',
        'name',
        'email',
        'password',
        'mobile',
        'address',
        'country',
        'city',
        'state',
        'zip',
        'company',
        'gstin',
        'status',
    ];
}
