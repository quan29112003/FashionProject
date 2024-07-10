@extends('admin.layouts.master')

@section('title', 'Create Comment')

@section('content')
<div class="container">
    <h1>Create Comment</h1>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

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
            <label for="rating">Rating:</label>
            <select name="rating" class="form-control" required>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection