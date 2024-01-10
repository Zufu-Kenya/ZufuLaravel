<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductTypeRequest;
use App\Http\Requests\UpdateProductTypeRequest;
use App\Models\ProductType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('productTypes.index', [
            'productType' => ProductType::latest()->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('productTypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductTypeRequest $request): RedirectResponse
    {
        ProductType::create($request->all());

        return redirect()->route('productTypes.index')->withSuccess('Product type created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductType $productType): View
    {
        return view('productTypes.show', [
            'productType' => $productType,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductType $productType): View
    {
        return view('productTypes.edit', [
            'productType' => $productType,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductTypeRequest $request, ProductType $productType): RedirectResponse
    {
        $productType->update($request->all());

        return redirect()->back()->withSuccess('Product Type updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductType $productType)
    {
        $productType->delete();

        return redirect()->route('producTypes.index')->withSuccess('Product Type deleted successfully');
    }
}
