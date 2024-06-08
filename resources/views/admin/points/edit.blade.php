@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Chỉnh sửa điểm tích lũy</h1>
    <form action="{{ route('admin.points.update', $point->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="user_id">Người dùng</label>
            <select name="user_id" class="form-control" id="user_id" required>
                @foreach($users as $user)
                <option value="{{ $user->id }}" {{ $user->id == $point->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="points">Điểm tích lũy</label>
            <input type="number" name="points" class="form-control" id="points" value="{{ $point->points }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật điểm tích lũy</button>
    </form>
</div>
@endsection
