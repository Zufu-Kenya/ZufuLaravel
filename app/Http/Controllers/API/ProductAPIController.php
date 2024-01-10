<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductAPIController extends Controller
{
    /**
     * Get a list of products.
     */
    public function index()
    {
        $products = Product::all();

        return response()->json($products, 200);
    }
}
