@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ isset($voucher) ? 'Sửa Voucher' : 'Thêm Mới Voucher' }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ isset($voucher) ? route('admin.vouchers.update', $voucher->id) : route('admin.vouchers.store') }}" method="POST">
                        @csrf
                        @if(isset($voucher))
                            @method('PUT')
                        @endif
                        @csrf
        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" name="code" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="discount_type">Discount Type:</label>
            <input type="text" name="discount_type" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="discount_value">Discount Value:</label>
            <input type="text" name="discount_value" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="expiry_date">Expiry Date:</label>
            <input type="date" name="expiry_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="min_purchase_amount">Min Purchase Amount:</label>
            <input type="text" name="min_purchase_amount" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="max_usage">Max Usage:</label>
            <input type="text" name="max_usage" class="form-control">
        </div>
        <div class="form-group">
            <label for="used_count">Used Count:</label>
            <input type="text" name="used_count" class="form-control">
        </div>
        <div class="form-group">
            <label for="applicable_products">Applicable Products:</label>
            <input type="text" name="applicable_products" class="form-control">
        </div>
        <div class="form-group">
            <label for="created_count">Created Count:</label>
            <input type="text" name="created_count" class="form-control">
        </div>
        <div class="form-group">
            <label for="remaining_count">Remaining Count:</label>
            <input type="text" name="remaining_count" class="form-control">
        </div>
        <div class="form-group">
            <label for="distribution_channels">Distribution Channels:</label>
            <input type="text" name="distribution_channels" class="form-control">
        </div>
                        <!-- Add other fields similarly -->
                        <button type="submit" class="btn btn-primary">{{ isset($voucher) ? 'Cập Nhật' : 'Thêm Mới' }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
