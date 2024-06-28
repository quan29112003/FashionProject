@extends('admin.layouts.master')

@section('title', 'Create Comment')

@section('content')
<div class="container">
    <h1>Create Comment</h1>
    <form action="{{ route('admin.comments.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="productID">Product:</label>
            <select name="productID" class="form-control" required>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name_product }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="userID">User:</label>
            <select name="userID" class="form-control" required>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nameUser }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="comment">Comment:</label>
            <textarea name="comment" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="createAt">Create At:</label>
            <input type="date" name="createAt" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="rating">Rating:</label>
            <input type="number" name="rating" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
