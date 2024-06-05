@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Danh sách khuyến mãi</h1>
        <a href="{{ route('promotions.create') }}" class="btn btn-success">Tạo khuyến mãi mới</a>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Mã</th>
                        <th>Mô tả</th>
                        <th>Giảm giá</th>
                        <th>Ngày bắt đầu</th>
                        <th>Ngày kết thúc</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promotions as $promotion)
                    <tr>
                        <td>{{ $promotion->code }}</td>
                        <td>{{ $promotion->description }}</td>
                        <td>{{ $promotion->discount }}%</td>
                        <td>{{ $promotion->start_date }}</td>
                        <td>{{ $promotion->end_date }}</td>
                        <td class="d-flex">
                            <a href="{{ route('promotions.edit', $promotion->id) }}" class="btn btn-warning btn-sm mr-2">Sửa</a>
                            <form action="{{ route('promotions.destroy', $promotion->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa khuyến mãi này không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .container {
        max-width: 900px;
    }
    .card {
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .card-body {
        padding: 0;
    }
    .thead-dark th {
        background-color: #343a40;
        color: #fff;
    }
    .table-bordered th, .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .table-bordered thead th {
        border-bottom-width: 2px;
    }
    .btn-success {
        background-color: #28a745;
        border-color: #28a745;
    }
    .btn-success:hover {
        background-color: #218838;
        border-color: #1e7e34;
    }
    .btn-warning {
        background-color: #ffc107;
        border-color: #ffc107;
    }
    .btn-warning:hover {
        background-color: #e0a800;
        border-color: #d39e00;
    }
    .btn-danger {
        background-color: #dc3545;
        border-color: #dc3545;
    }
    .btn-danger:hover {
        background-color: #c82333;
        border-color: #bd2130;
    }
    .mr-2 {
        margin-right: 0.5rem;
    }
</style>
@endsection
