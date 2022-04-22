<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shoes extends Model
{
    protected $table = 'shoes';
    protected $fillable = [
        'model_name',
        'manufacturer_brand',
        'size',
        'price',
        'gender',
    ];

    
}
