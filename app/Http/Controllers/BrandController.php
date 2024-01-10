<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequests\StoreBrandRequest;
use App\Http\Requests\BrandRequests\UpdateBrandRequest;
use App\Models\Brand;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-brand|edit-brand|delete-brand', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-brand', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-brand', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-brand', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        return view('brands.index', [
            'brands' => Brand::latest()->paginate(10),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('brands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBrandRequest $request): RedirectResponse
    {
        Brand::create($request->all());

        return redirect()->route('brands.index')->withSuccess('Brand Successfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Brand $brand): View
    {
        return view('brands.show', [
            'brand' => $brand,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand): View
    {
        return view('brands.edit', [
            'brand' => $brand,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBrandRequest $request, Brand $brand): RedirectResponse
    {
        $brand->update($request->all());

        return redirect()->back()->withSuccess('Successfully updated the specified brand');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand): RedirectResponse
    {
        $brand->delete();

        return redirect()->route('brands.index')->withSuccess('Successfully deleted the specified brand');
    }
}
