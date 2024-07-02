@extends('admin.layouts.master')

@section('title')
    Thêm mới sản phẩm
@endsection

@section('content')

    <form action="{{ route('handleStore-product') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Product</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">

                            <div class="row">
                                <div class="col-lg-4">
                                    <div>
                                        <label for="basiInput" class="form-label">Name</label>
                                        <input type="text" class="form-control" name="name_product" id="basiInput">
                                        @error('name_product')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="basiInput" class="form-label">Category</label>
                                    <select class="form-select rounded-pill mb-3" name="category_id" aria-label="Default select example">
                                        <option selected>Select Category</option>
                                        @foreach ($category as $id => $name )
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                                <div class="col-lg-4">
                                    <label for="img_thumbnail" class="form-label">Img Thumbnail</label>
                                    <input type="file" class="form-control" name="thumbnail" id="img_thumbnail">
                                </div>
                                @error('thumbnail')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                <div class="row">
                                    @php
                                        $is = [
                                            'is_active' => 'primary',
                                            'is_hot' => 'danger',
                                            'is_good_deal' => 'warning',
                                            'is_show_home' => 'info',
                                        ];
                                    @endphp

                                    @foreach($is as $key => $color)
                                        <div class="col-md-3">
                                            <div class="form-check form-switch form-switch-{{ $color }}">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                       name="{{ $key }}" value="1" id="{{ $key }}" checked>
                                                <label class="form-check-label"
                                                       for="{{ $key }}">{{ \Str::convertCase($key, MB_CASE_TITLE) }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <h1>Description</h1>
                                    <textarea name="description" id="editor">
                                        <p>This is some sample content.</p>
                                    </textarea>
                                    @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Product Variant</h4>
                    </div>
                    @error('productVariant')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('productVariant.*.color')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('productVariant.*.size')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('productVariant.*.quantity')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('productVariant.*.price')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('productVariant.*.price_sale')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('productVariant.*.SKU')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h4>Chọn màu</h4>
                                    <select class="form-select" id="colorSelect" multiple aria-label="multiple select example">
                                        @foreach ($product_color as $id => $color )
                                            <option value="{{ $id }}">{{ $color }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-6">
                                    <h4>Chọn kích thước</h4>
                                    <select class="form-select" id="sizeSelect"  multiple aria-label="multiple select example">

                                        @foreach ($product_size as $id => $size )
                                            <option value="{{ $id }}">{{ $size }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div id="output" class="row">

                                <!-- Nơi để hiển thị các biến thể sản phẩm -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Gallery</h4>
                        <button type="button" class="btn btn-primary" onclick="addImageGallery()">Thêm ảnh</button>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4" id="gallery_list">
                                <div class="col-md-4" id="gallery_default_item">
                                    <label for="gallery_default" class="form-label">Image</label>
                                    <div class="d-flex">
                                        <input type="file" class="form-control" name="product_images[]"
                                            id="gallery_default">
                                    </div>
                                    @error('product_images')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--end col-->
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
    </form>
    <script>
        //IMAGE
        function addImageGallery() {
            let id = 'gen' + '_' + Math.random().toString(36).substring(2, 15).toLowerCase();
            let html = `
                <div class="col-md-4" id="${id}_item">
                    <label for="${id}" class="form-label">Image</label>
                    <div class="d-flex">
                        <input type="file" class="form-control" name="product_images[]" id="${id}">
                        <button type="button" class="btn btn-danger" onclick="removeImageGallery('${id}_item')">
                            <span class="bx bx-trash"></span>
                        </button>
                    </div>
                </div>
            `;

            $('#gallery_list').append(html);
        }

        function removeImageGallery(id) {
            if (confirm('Chắc chắn xóa không?')) {
                $('#' + id).remove();
            }
        }

        //CKEDITOR
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });

        // PRODUCTVARIANT

        // Lấy tham chiếu đến các phần tử từ HTML
        const colorSelect = document.getElementById('colorSelect');
        const sizeSelect = document.getElementById('sizeSelect');
        const outputDiv = document.getElementById('output');

        // Mảng để lưu trữ các biến thể sản phẩm
        let productVariants = [];

        // Hàm để tạo biến thể sản phẩm dựa trên các lựa chọn đã chọn
        function createProductVariants() {
            // Xóa các biến thể cũ
            productVariants = [];

            // Lấy các giá trị đã chọn từ colorSelect và sizeSelect
            const selectedColors = Array.from(colorSelect.selectedOptions).map(option => ({
                id: option.value,
                value: option.value,
                text: option.textContent.trim()
            }));

            const selectedSizes = Array.from(sizeSelect.selectedOptions).map(option => ({
                id: option.value,
                value: option.value,
                text: option.textContent.trim()
            }));

            // Tạo các biến thể sản phẩm dựa trên các giá trị đã chọn
            selectedColors.forEach(color => {
                selectedSizes.forEach(size => {
                    const variant = {
                        color: {
                            id: color.id,
                            value: color.value,
                            text: color.text
                        },
                        size: {
                            id: size.id,
                            value: size.value,
                            text: size.text
                        }
                    };
                    // Thêm biến thể vào mảng productVariants
                    productVariants.push(variant);
                });
            });

            // Hiển thị lại danh sách các biến thể sản phẩm
            displayProductVariants();
        }

        // Hàm để hiển thị các biến thể sản phẩm
        function displayProductVariants() {
            // Xóa nội dung cũ của outputDiv
            outputDiv.innerHTML = '';

            // Duyệt qua mảng productVariants và hiển thị từng biến thể
            productVariants.forEach((variant, index) => {
                const variantElement = document.createElement('div');
                variantElement.classList.add('variant-item');
                variantElement.innerHTML = `
                <div class="card-header align-items-center d-flex">
                <h5>Biến thể ${variant.color.text} và ${variant.size.text}</h5>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="live-preview">
                                <div id="output"  class="row gy-4">
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <input type="text" class="form-control" name="productVariant[${index}]['size']" id="disabledInput" value="${variant.size.value}" hidden>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <div>
                                            <input type="text" class="form-control" name="productVariant[${index}]['color']" id="disabledInput" value="${variant.color.value}" hidden>
                                        </div>
                                    </div>
                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">Quantity</label>
                                        <input type="number" class="form-control" name="productVariant[${index}]['quantity']" id="basiInput">
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">Price Regular</label>
                                        <input type="number" class="form-control" name="productVariant[${index}]['price']" id="basiInput">
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">Price Sale</label>
                                        <input type="number" class="form-control" name="productVariant[${index}]['price_sale']" id="basiInput">
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">SKU</label>
                                        <input type="text" class="form-control" name="productVariant[${index}]['SKU']" id="basiInput">
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" value="1" name="productVariant[${index}]['is_active']" role="switch" id="SwitchCheck1" checked>
                                            <label class="form-check-label" for="SwitchCheck1">Switch Default</label>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        `;
                // Thêm variantElement vào outputDiv
                outputDiv.appendChild(variantElement);
            });
        }

        // Lắng nghe sự kiện change trên các select
        colorSelect.addEventListener('change', createProductVariants);
        sizeSelect.addEventListener('change', createProductVariants);

        // Gọi hàm để hiển thị các biến thể sản phẩm ban đầu khi tải trang
        displayProductVariants();
    </script>
@endsection
