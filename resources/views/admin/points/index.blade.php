@extends('layouts.admin')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Quản lý điểm tích lũy</h1>
        <a href="{{ route('admin.points.create') }}" class="btn btn-success">Tạo điểm tích lũy mới</a>
    </div>
    <div class="card">
        <div class="card-body p-0">
            <table class="table table-bordered mb-0">
                <thead class="thead-dark">
                    <tr>
                        <th>Người dùng</th>
                        <th>Điểm tích lũy</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($points as $point)
                    <tr>
                        <td>{{ $point->user->name }}</td>
                        <td>{{ $point->points }}</td>
                        <td class="d-flex">
                            <a href="{{ route('admin.points.edit', $point->id) }}" class="btn btn-warning btn-sm mr-2">Sửa</a>
                            <form action="{{ route('admin.points.destroy', $point->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa điểm tích lũy này?');">
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
