@extends('admin.layouts.master')

@section('title', 'Create User')

@section('content')
<div class="container">
    <h1>Create User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nameUser">Name:</label>
            <input type="text" name="nameUser" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="birthday">Birthday:</label>
            <input type="date" name="birthday" class="form-control">
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="address">Address:</label>
            <input type="text" name="address" class="form-control">
        </div>
        <div class="form-group">
            <label for="role">Role:</label>
            <select name="role" class="form-control">
                <option value="0">Khách hàng</option>
                <option value="1">Nhân viên</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
