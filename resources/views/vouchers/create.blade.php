@extends('layouts.app')

@section('title', 'Create Voucher')

@section('content')
<div class="container">
    <h1>Create Voucher</h1>
    <form action="{{ route('vouchers.store') }}" method="POST">
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
            <label for="point_required">Point Required:</label>
            <input type="text" name="point_required" class="form-control">
        </div>
        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-control">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nameCategory }}</option>
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
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>
@endsection
