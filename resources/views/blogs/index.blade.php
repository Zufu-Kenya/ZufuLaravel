@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Blogs List</div>
    <div class="card-body">
        @can('create-blog')
            <a href="{{ route('blogs.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Create New Blog</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Title</th>
                <th scope="col">Body</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($blogs as $blog)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->body }}</td>
                    <td>
                        @if ($blog->image)
                            <img src="{{ asset('storage/' . $blog->image) }}" alt="Blog Image" style="max-width: 100px; max-height: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <form action="{{ route('blogs.destroy', $blog->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('blogs.show', $blog->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-blog')
                                <a href="{{ route('blogs.edit', $blog->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-blog')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this blog?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No blog Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $blogs->links() }}

    </div>
</div>
@endsection