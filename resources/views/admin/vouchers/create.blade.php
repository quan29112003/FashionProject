@extends('admin.layouts.master')

@section('title')
    Thêm mới Voucher
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Voucher</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Voucher</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.vouchers.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

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
                                        <input type="text" class="form-control" name="code" id="code" required>
                                        @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="discount_type" class="form-label">Discount Type</label>
                                        <select class="form-select" name="discount_type" required>
                                            <option value="Giảm giá cho đồ thời trang">Giảm giá cho đồ thời trang</option>
                                            <option value="Miễn phí vận chuyển">Miễn phí vận chuyển</option>
                                            <option value="Discount">Discount</option>
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
                                            id="discount_value" required>
                                        @error('discount_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="expiry_date" class="form-label">Expiry Date</label>
                                        <input type="date" class="form-control" name="expiry_date" id="expiry_date"
                                            required>
                                        @error('expiry_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="min_purchase_amount" class="form-label">Min Purchase Amount</label>
                                        <input type="number" step="0.01" class="form-control" name="min_purchase_amount"
                                            id="min_purchase_amount">
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
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                                                <option value="{{ $product->id }}">{{ $product->name_product }}</option>
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
                                        <input type="number" class="form-control" name="max_usage" id="max_usage">
                                        @error('max_usage')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="distribution_channels" class="form-label">Distribution Channels</label>
                                        <input type="text" class="form-control" name="distribution_channels"
                                            id="distribution_channels">
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
                                            <button class="btn btn-primary" type="submit">Save</button>
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
    <<script>
        document.getElementById('category_id').addEventListener('change', function() {
            var categoryId = this.value;
            fetch('/products/' + categoryId)
                .then(response => response.json())
                .then(data => {
                    var applicableProductsSelect = $('#applicable_products');
                    applicableProductsSelect.empty();
                    data.forEach(product => {
                        var option = new Option(product.name_product, product.id, false, false);
                        applicableProductsSelect.append(option);
                    });
                    applicableProductsSelect.trigger('change');
                });
        });
    </script>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
