<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Category;

class CategoryAPIController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return response()->json($categories, 200);
    }
}
