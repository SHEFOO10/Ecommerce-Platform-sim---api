<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new OrderResource(
            auth()->user()->orders
        ->map(function ($order) {
            return [
                ...collect($order)->toArray(),
                'products' => $order->products,
            ];
        })
    );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request)
    {
        // dd($request);
        $product_ids = collect($request->products)
                        ->map(
                            fn ($product) => collect($product)
                            ->filter(fn ($value, $key) => $key == 'id')
                            )
                            ->flatten();
        // dd($product_ids);
        $products = Product::findorfail($product_ids);
        $order_price = 0;
        $product_index = 0;
        foreach ($products as $product)
        {
            $order_price += $product->price * $request->products[$product_index]['quantity'];
            $product_index +=1;
        }
        // dd($order_price, $products, $request->user()->id);
        return DB::transaction(function () use ($request, $order_price, $products) {
            $order = Order::create(
                [
                    'order_number' => 'ORD-' . now()->format('YmdHis'),
                    'user_id' => $request->user()->id,
                    'order_price' => $order_price
                ]
            );
            $arr_of_products = $products->map(function($product) {
                return [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'quantity' => 5,
                    'product_price' => $product->price,
                ];
            });
            
            $order->products()->attach($arr_of_products);
            $product_index = 0;
            foreach ($products as $product)
            {
                $product->stock_quantity -= $request->products[$product_index]['quantity'];
                $product_index +=1;
                $product->save();
            }
            return $order;
        });

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        // attach products to the order by calling the relation.
        $order->products;
        return  [ 'order' => $order ];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreOrderRequest $request, string $id)
    {
        dd('update here');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        dd('delete here');
    }
}
