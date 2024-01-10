<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\ProductType;

class ProductTypeAPIController extends Controller
{
    public function index()
    {
        $productTypes = ProductType::all();

        return response()->json($productTypes, 200);
    }
}
