@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Blog Information
                </div>
                <div class="float-end">
                    <a href="{{ route('blogs.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start"><strong>Title:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $blog->title }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="body" class="col-md-4 col-form-label text-md-end text-start"><strong>Body:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $blog->body }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="image" class="col-md-4 col-form-label text-md-end text-start"><strong>Image:</strong></label>
                        <div class="col-md-6">
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="max-width: 100%;">
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