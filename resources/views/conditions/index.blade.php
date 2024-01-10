@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Product Condtion List</div>
    <div class="card-body">
        @can('create-condition')
            <a href="{{ route('conditions.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Create New Condition</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($conditions as $condition)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $condition->name }}</td>
                    <td>{{ $condition->description }}</td>
                    <td>
                        <form action="{{ route('conditions.destroy', $condition->id) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('conditions.show', $condition->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-condition')
                                <a href="{{ route('conditions.edit', $condition->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-condition')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this condition?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Condition Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $conditions->links() }}

    </div>
</div>
@endsection