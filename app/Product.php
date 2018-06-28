<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'barcode', 'cost', 'price', 'sales', 'total_sum', 'category_id', 'unit_type', 'image', 'favorite', 'published', 'status', 'user_id'];
}
