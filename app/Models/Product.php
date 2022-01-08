<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'name',
        'min_qty',
        'price',
        'quantity',
        'category_id',
        'subcategory_id',
        'image',
    ];
}
