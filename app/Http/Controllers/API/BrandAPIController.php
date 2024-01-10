<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class BrandAPIController extends Controller
{
    public function index()
    {
        $brands = Brand::all();

        return response()->json($brands, 200);
    }
}
