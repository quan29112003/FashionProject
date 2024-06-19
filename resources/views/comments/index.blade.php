@extends('layouts.app')

@section('title', 'Comments')

@section('content')
<div class="container">
    <h1>Comments</h1>
    <a href="{{ route('comments.create') }}" class="btn btn-primary mb-3">Create New Comment</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th>User</th>
                <th>Comment</th>
                <th>Create At</th>
                <th>Rating</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($comments as $comment)
                <tr>
                    <td>{{ $comment->product->name_product }}</td>
                    <td>{{ $comment->user->nameUser }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->createAt }}</td>
                    <td>{{ $comment->rating }}</td>
                    <td>
                        <a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="POST" style="display:inline;">
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
