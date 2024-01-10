@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Product Information
                </div>
                <div class="float-end">
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start"><strong>Description:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->description }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start"><strong>Price:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->price }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="condition" class="col-md-4 col-form-label text-md-end text-start"><strong>Condition:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->condition ? $product->condition->name : 'N/A' }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="brand" class="col-md-4 col-form-label text-md-end text-start"><strong>Brand:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $product->brand ? $product->brand->name : 'N/A' }}
                        </div>
                    </div>
                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label text-md-end text-start"><strong>Image:</strong></label>
                        <div class="col-md-6">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}" alt="Product Image" style="max-width: 100%;">
                            @else
                                No Image
                            @endif
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection