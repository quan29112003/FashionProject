@extends('layouts.app')

@section('title', 'Vouchers')

@section('content')
<div class="container">
    <h1>Vouchers</h1>
    <a href="{{ route('vouchers.create') }}" class="btn btn-primary mb-3">Create New Voucher</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Code</th>
                <th>Discount Type</th>
                <th>Discount Value</th>
                <th>Expiry Date</th>
                <th>Min Purchase Amount</th>
                <th>Point Required</th>
                <th>Category</th>
                <th>Max Usage</th>
                <th>Used Count</th>
                <th>Applicable Products</th>
                <th>Created Count</th>
                <th>Remaining Count</th>
                <th>Distribution Channels</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($vouchers as $voucher)
                <tr>
                    <td>{{ $voucher->code }}</td>
                    <td>{{ $voucher->discount_type }}</td>
                    <td>{{ $voucher->discount_value }}</td>
                    <td>{{ $voucher->expiry_date }}</td>
                    <td>{{ $voucher->min_purchase_amount }}</td>
                    <td>{{ $voucher->point_required }}</td>
                    <td>{{ $voucher->category ? $voucher->category->name : '' }}</td>
                    <td>{{ $voucher->max_usage }}</td>
                    <td>{{ $voucher->used_count }}</td>
                    <td>{{ $voucher->applicable_products }}</td>
                    <td>{{ $voucher->created_count }}</td>
                    <td>{{ $voucher->remaining_count }}</td>
                    <td>{{ $voucher->distribution_channels }}</td>
                    <td>
                        <a href="{{ route('vouchers.edit', $voucher->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('vouchers.destroy', $voucher->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Bạn có chắc chắn muốn xóa Voucher này không?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
