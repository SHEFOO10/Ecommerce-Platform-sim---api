<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::transaction(function () {
            $new_order = Order::factory()->create();
            $products = Product::find([1, 2, 3]);
            $new_products =  $products->map(function($product) {
                return [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => 5,
                    'product_price' => $product->price,
                ];
            });
            $new_order->products()->attach($new_products);
        });

    }
}
