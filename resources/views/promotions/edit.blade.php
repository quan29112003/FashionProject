@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh sửa khuyến mãi</h1>
    <form action="{{ route('promotions.update', $promotion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="code">Mã khuyến mãi</label>
            <input type="text" name="code" class="form-control" id="code" value="{{ $promotion->code }}" required>
        </div>
        <div class="form-group">
            <label for="description">Mô tả</label>
            <textarea name="description" class="form-control" id="description" required>{{ $promotion->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="discount">Giảm giá (%)</label>
            <input type="number" name="discount" class="form-control" id="discount" value="{{ $promotion->discount }}" required>
        </div>
        <div class="form-group">
            <label for="start_date">Ngày bắt đầu</label>
            <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $promotion->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">Ngày kết thúc</label>
            <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $promotion->end_date }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật khuyến mãi</button>
    </form>
</div>
@endsection
