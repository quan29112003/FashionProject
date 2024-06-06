@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <h1>Tạo điểm tích lũy mới</h1>
    <form action="{{ route('admin.points.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Người dùng</label>
            <input type="text" name="name" class="form-control" id="name" required list="user_list" placeholder="Chọn hoặc nhập tên người dùng">
            <datalist id="user_list">
                @foreach($users as $user)
                <option value="{{ $user->name }}">
                @endforeach
            </datalist>
        </div>
        <div class="form-group">
            <label for="points">Điểm tích lũy</label>
            <input type="number" name="points" class="form-control" id="points" required>
        </div>
        <button type="submit" class="btn btn-primary">Tạo điểm tích lũy</button>
    </form>
</div>
@endsection
