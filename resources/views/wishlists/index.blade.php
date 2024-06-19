@extends('layouts.app')

@section('title', 'Wishlists')

@section('content')
<div class="container">
    <h1>Wishlists</h1>
    <a href="{{ route('wishlists.create') }}" class="btn btn-primary mb-3">Create New Wishlist</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>User</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wishlists as $wishlist)
                <tr>
                    <td>{{ $wishlist->user->nameUser }}</td>
                    <td>{{ $wishlist->created_at }}</td>
                    <td>
                        <a href="{{ route('wishlists.edit', $wishlist->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('wishlists.destroy', $wishlist->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
