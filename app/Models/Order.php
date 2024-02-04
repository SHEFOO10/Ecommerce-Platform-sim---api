<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id',
        'order_price',
        'order_number'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_order')
                    ->withPivot('product_name', 'quantity', 'product_price')
                    ->as('order_product');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
