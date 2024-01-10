@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <p>This is your application dashboard.</p>
                    @canany(['create-role', 'edit-role', 'delete-role'])
                        <a class="btn btn-primary" href="{{ route('roles.index') }}">
                            <i class="bi bi-person-fill-gear"></i> Manage Roles</a>
                    @endcanany
                    @canany(['create-user', 'edit-user', 'delete-user'])
                        <a class="btn btn-success" href="{{ route('users.index') }}">
                            <i class="bi bi-people"></i> Manage Users</a>
                    @endcanany
                    @canany(['create-product', 'edit-product', 'delete-product'])
                        <a class="btn btn-warning" href="{{ route('products.index') }}">
                            <i class="bi bi-bag"></i> Manage Products</a>
                    @endcanany
                    @canany(['create-condition', 'edit-condition', 'delete-condition'])
                        <a class="btn btn-warning" href="{{ route('conditions.index') }}">
                            <i class="bi bi-star"></i> Manage Conditions</a>
                    @endcanany
                    @canany(['create-blog', 'edit-blog', 'delete-blog'])
                        <a class="btn btn-warning" href="{{ route('blogs.index') }}">
                            <i class="bi bi-book"></i> Manage Blogs</a>
                    @endcanany
                    @canany(['create-productType', 'edit-productType', 'delete-productType'])
                        <a class="btn btn-warning" href="{{ route('productTypes.index') }}">
                            <i class="bi bi-box"></i> Manage Product Types</a>
                    @endcanany
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection