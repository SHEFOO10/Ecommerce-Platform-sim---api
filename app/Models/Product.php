<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'description',
        'price',
        'stock_quantity',
    ];
 
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'product_order');
    }
}
