@extends('admin.layouts.master')

@section('title')
    Sửa Voucher
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Sửa Voucher</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Voucher</a></li>
                        <li class="breadcrumb-item active">Sửa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <form action="{{ route('admin.vouchers.update', $voucher->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                <div class="col-md-4">
                                    <div>
                                        <label for="code" class="form-label">Code</label>
                                        <input type="text" class="form-control" name="code"
                                            value="{{ $voucher->code }}" required>
                                        @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="discount_type" class="form-label">Discount Type</label>
                                        <select class="form-select" name="discount_type" required>
                                            <option value="Giảm giá cho đồ thời trang"
                                                {{ $voucher->discount_type == 'Giảm giá cho đồ thời trang' ? 'selected' : '' }}>
                                                Giảm giá cho đồ thời trang</option>
                                            <option value="Miễn phí vận chuyển"
                                                {{ $voucher->discount_type == 'Miễn phí vận chuyển' ? 'selected' : '' }}>
                                                Miễn phí vận chuyển</option>
                                            <option value="Discount"
                                                {{ $voucher->discount_type == 'Discount' ? 'selected' : '' }}>Discount
                                            </option>
                                        </select>
                                        @error('discount_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="discount_value" class="form-label">Discount Value</label>
                                        <input type="number" step="0.01" class="form-control" name="discount_value"
                                            value="{{ $voucher->discount_value }}" required>
                                        @error('discount_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" name="expiry_date"
                                            value="{{ $voucher->expiry_date }}" required>
                                        @error('expiry_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="min_purchase_amount" class="form-label">Min Purchase Amount</label>
                                        <input type="number" step="0.01" class="form-control" name="min_purchase_amount"
                                            value="{{ $voucher->min_purchase_amount }}">
                                        @error('min_purchase_amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-select" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ $voucher->category_id == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="applicable_products" class="form-label">Applicable Products</label>
                                        <select class="form-select select2" name="applicable_products[]"
                                            id="applicable_products" multiple>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}"
                                                    {{ in_array($product->id, $voucher->products->pluck('id')->toArray()) ? 'selected' : '' }}>
                                                    {{ $product->name_product }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('applicable_products')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="max_usage" class="form-label">Max Usage</label>
                                        <input type="number" class="form-control" name="max_usage"
                                            value="{{ $voucher->max_usage }}">
                                        @error('max_usage')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="used_count" class="form-label">Used Count</label>
                                        <input type="number" class="form-control" name="used_count"
                                            value="{{ $voucher->used_count }}">
                                        @error('used_count')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="created_count" class="form-label">Created Count</label>
                                        <input type="number" class="form-control" name="created_count"
                                            value="{{ $voucher->created_count }}">
                                        @error('created_count')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="remaining_count" class="form-label">Remaining Count</label>
                                        <input type="number" class="form-control" name="remaining_count"
                                            value="{{ $voucher->remaining_count }}">
                                        @error('remaining_count')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="distribution_channels" class="form-label">Distribution
                                            Channels</label>
                                        <input type="text" class="form-control" name="distribution_channels"
                                            value="{{ $voucher->distribution_channels }}">
                                        @error('distribution_channels')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <button class="btn btn-primary" type="submit">Cập Nhật</button>
                                        </div><!-- end card header -->
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
    <script>
        document.getElementById('category_id').addEventListener('change', function() {
            var categoryId = this.value;
            fetch('/products/' + categoryId)
                .then(response => response.json())
                .then(data => {
                    var applicableProductsSelect = document.getElementById('applicable_products');
                    applicableProductsSelect.innerHTML = '';
                    data.forEach(product => {
                        var option = document.createElement('option');
                        option.value = product.id;
                        option.text = product.name;
                        applicableProductsSelect.appendChild(option);
                    });
                });
        });
    </script>
@endsection
