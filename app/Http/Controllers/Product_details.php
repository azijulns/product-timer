<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductDetail;

class Product_details extends Controller {
    public function index() {
        $shop = auth()->user();
        if (!$shop) {
            return redirect()->route('login');
        }

        $shopify = $shop->api();
        $products = $shopify->rest('GET', '/admin/api/2025-01/products.json');
        // dd($products);

        return view('dashboard', ['products' => $products['body']['products']]);
    }

}
    // public function get_product() {
    //     $product = ProductDetail::where('shop_id', 1)->get();
    //     dd($product);
    // }
    // public function add_product() {
    //     // 1. Instantiate
    //     $product = new ProductDetail();

    //     // 2. Set your demo values
    //     $product->shop_id      = 1;                          // demo shop ID
    //     $product->product_id   = 'demo123';                  // demo product ID (string column)
    //     $product->title        = 'Demo Product Title';       // demo title
    //     $product->created_time = now()->timestamp;           // pseudo “created at” timestamp

    //     // 3. Persist to the DB
    //     $product->save();

    //     return response()->json([
    //         'message' => 'Demo product created!',
    //         'product' => $product,
    //     ], 201);
    // }