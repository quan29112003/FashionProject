@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container">
    <h1>Edit User</h1>
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nameUser">Name:</label>
            <input type="text" name="nameUser" class="form-control" value="{{ $user->nameUser }}" required>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" class="form-control" value="{{ $user->birthday ? \Carbon\Carbon::parse($user->birthday)->format('Y-m-d') : '' }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control" value="{{ $user->address }}">
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" class="form-control">
                <option value="0" {{ $user->role == 0 ? 'selected' : '' }}>Khách Hàng</option>
                <option value="1" {{ $user->role == 1 ? 'selected' : '' }}>Nhân Viên</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
