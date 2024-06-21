@extends('layouts.app')

@section('title', 'Create Wishlist')

@section('content')
<div class="container">
    <h1>Create Wishlist</h1>
    <form action="{{ route('wishlists.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="userID">User:</label>
            <select name="userID" class="form-control">
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->nameUser }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
