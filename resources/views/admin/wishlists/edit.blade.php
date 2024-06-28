@extends('admin.layouts.master')

@section('title', 'Edit Wishlist')

@section('content')
<div class="container">
    <h1>Edit Wishlist</h1>
    <form action="{{ route('admin.wishlists.update', $wishlist->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="userID">User:</label>
            <select name="userID" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ $wishlist->userID == $user->id ? 'selected' : '' }}>{{ $user->nameUser }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
