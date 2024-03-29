<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequests\StoreProductRequest;
use App\Http\Requests\ProductRequests\UpdateProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Condition;
use App\Models\Product;
use App\Traits\UploadImagesTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProductController extends Controller
{
    use UploadImagesTrait;

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-product|edit-product|delete-product', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-product', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-product', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-product', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('products.index', [
            'products' => Product::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $conditions = Condition::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('products.create', compact('conditions', 'brands', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): RedirectResponse
    {
        $data = $request->validated();

        $product = Product::create($data);

        $this->uploadImages($request, $product);

        return redirect()->route('products.index')->withSuccess('Successfully created a new product');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): View
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product): View
    {
        $conditions = Condition::all();
        $brands = Brand::all();
        $categories = Category::all();

        return view('products.edit', [
            'product' => $product,
            'conditions' => $conditions,
            'brands' => $brands,
            'categories' => $categories,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): RedirectResponse
    {
        $data = $request->validated();

        $product->update($data);

        $this->uploadImages($request, $product);

        return redirect()->back()->withSuccess('Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('products.index')->withSuccess('Product deleted successfully');
    }
}
