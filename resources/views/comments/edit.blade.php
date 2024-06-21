@extends('layouts.app')

@section('title', 'Edit Comment')

@section('content')
<div class="container">
    <h1>Edit Comment</h1>
    <form action="{{ route('comments.update', $comment->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="productID">Product:</label>
            <select name="productID" class="form-control">
                @foreach($products as $product)
                    <option value="{{ $product->id }}" {{ $comment->productID == $product->id ? 'selected' : '' }}>{{ $product->name_product }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="userID">User:</label>
            <select name="userID" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $comment->userID == $user->id ? 'selected' : '' }}>{{ $user->nameUser }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea name="comment" class="form-control" required>{{ $comment->comment }}</textarea>
        </div>
        <div class="form-group">
            <label for="createAt">Create At:</label>
            <input type="date" name="createAt" class="form-control" value="{{ $comment->createAt }}" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" class="form-control" value="{{ $comment->rating }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
