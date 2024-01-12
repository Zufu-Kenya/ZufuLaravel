<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductAPIController extends Controller
{
    /**
     * Get a list of products.
     */
    public function index()
    {
        $products = Product::with('condition', 'brand', 'category')->get();

        return response()->json($products, 200);
    }

    /**
     * Get products by category.
     */
    public function getByCategory(Request $request, $categoryName)
    {
        $category = Category::where('name', $categoryName)->first();

        if (!$category) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $products = Product::with('condition', 'brand', 'category')
            ->where('category_id', $category->id)
            ->get();

        return response()->json($products, 200);
    }

    /**
     * Get products by product brand.
     */
    public function getByBrand(Request $request, $brandName)
    {
        $brand = Brand::where('name', $brandName)->first();

        if (!$brand) {
            return response()->json(['error' => 'Brand not found'], 404);
        }

        $products = Product::with('condition', 'brand', 'category')
            ->where('brand_id', $brand->id)
            ->get();

        return response()->json($products, 200);
    }

    /**
     * Get products by product condition.
     */
    public function getByCondition(Request $request, $conditionName)
    {
        $condition = Condition::where('name', $conditionName)->first();

        if (!$condition) {
            return response()->json(['error' => 'Condition not found'], 404);
        }

        $products = Product::with('condition', 'brand', 'category')
            ->where('condition_id', $condition->id)
            ->get();

        return response()->json($products, 200);
    }
}
