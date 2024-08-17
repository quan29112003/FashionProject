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
                                        <label for="code" class="form-label">Mã</label>
                                        <input type="text" class="form-control" name="code" id="code" value="{{ old('code') }}">
                                        @error('code')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="discount_type" class="form-label">Loại giảm giá</label>
                                        <select class="form-select" name="discount_type" id="discount_type">
                                            <option value="discount" {{ old('discount_type') === 'discount' ? 'selected' : '' }}>Giảm giá tiền</option>
                                            <option value="discount%" {{ old('discount_type') === 'discount%' ? 'selected' : '' }}>Giảm theo %</option>
                                        </select>
                                        @error('discount_type')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div id="discount_value_container">
                                        <label for="discount_value" class="form-label">Giá trị giảm giá</label>
                                        <input type="number" step="0.01" class="form-control" name="discount_value" id="discount_value" value="{{ old('discount_value') }}">
                                        @error('discount_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="expiry_date" class="form-label">Ngày hết hạn</label>
                                        <input type="date" class="form-control" name="expiry_date" id="expiry_date" value="{{ old('expiry_date') }}">
                                        @error('expiry_date')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="min_purchase_amount" class="form-label">Số tiền tối thiểu để sử dụng</label>
                                        <input type="number" step="0.01" class="form-control" name="min_purchase_amount" id="min_purchase_amount" value="{{ old('min_purchase_amount') }}">
                                        @error('min_purchase_amount')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="category_id" class="form-label">Danh mục giảm giá</label>
                                        <select class="form-select" name="category_id">
                                            <option value="">Chọn danh mục</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="applicable_products" class="form-label">Sản phẩm giảm giá</label>
                                        <select class="form-select select2" name="applicable_products[]" id="applicable_products" multiple>
                                            @foreach ($products as $product)
                                                <option value="{{ $product->id }}" {{ in_array($product->id, old('applicable_products', [])) ? 'selected' : '' }}>{{ $product->name_product }}</option>
                                            @endforeach
                                        </select>
                                        @error('applicable_products')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="max_usage" class="form-label">Số lượng mã giảm giá</label>
                                        <input type="number" class="form-control" name="max_usage" id="max_usage" value="{{ old('max_usage') }}">
                                        @error('max_usage')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="distribution_channels" class="form-label">Kênh phân phối</label>
                                        <input type="text" class="form-control" name="distribution_channels" id="distribution_channels" value="{{ old('distribution_channels') }}">
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
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function () {
            const discountTypeSelect = document.getElementById('discount_type');
            const discountValueInput = document.getElementById('discount_value');

            function updateDiscountValueConstraints() {
                const discountType = discountTypeSelect.value;
                if (discountType === 'discount') {
                    discountValueInput.min = '0'; // Thiết lập giá trị tối thiểu là 0
                    discountValueInput.max = '999999'; // Thiết lập giá trị tối đa là 999999 (6 chữ số)
                    discountValueInput.placeholder = 'Nhập số tiền giảm giá'; // Placeholder cho giảm giá tiền
                } else if (discountType === 'discount%') {
                    discountValueInput.min = '0'; // Thiết lập giá trị tối thiểu là 0
                    discountValueInput.max = '100'; // Thiết lập giá trị tối đa là 100 (phần trăm)
                    discountValueInput.placeholder = 'Nhập phần trăm giảm giá'; // Placeholder cho giảm theo %
                }
            }

            discountTypeSelect.addEventListener('change', updateDiscountValueConstraints); // Thay đổi giới hạn khi chọn loại giảm giá
            updateDiscountValueConstraints(); // Kiểm tra và cập nhật ngay khi tải trang
        });
    </script> --}}
@endsection
