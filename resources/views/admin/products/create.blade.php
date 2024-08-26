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
                        <h4 class="card-title mb-0 flex-grow-1">Sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="live-preview">

                            <div class="row">
                                <div class="col-lg-3">
                                    <div>
                                        <label for="basiInput" class="form-label">Tên sản phẩm</label>
                                        <input type="text" class="form-control" name="name_product" id="basiInput">
                                        @error('name_product')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <label for="basiInput" class="form-label">Loại</label>
                                    <select class="form-select rounded-pill mb-3" name="category_id"
                                        aria-label="Default select example">
                                        <option selected>Chọn loại</option>
                                        @foreach ($category as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <label for="basiInput" class="form-label">Danh mục con</label>
                                    <select class="form-select rounded-pill mb-3" name="catalogue_id"
                                        aria-label="Default select example">
                                        <option selected>Chọn danh mục con</option>
                                        @foreach ($catalogue as $id => $name)
                                            <option value="{{ $id }}">{{ $name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-lg-3">
                                    <div>
                                        <label for="name" class="form-label">Thumbnail</label>
                                        <input type="file" class="form-control" name="thumbnail" id="thumbnail"
                                            accept="image/*">
                                        <img id="preview-thumbnail" src="#" alt="Preview Thumbnail"
                                            style="display: none; width: 100px; margin-top: 10px;">
                                        @error('thumbnail')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    @php
                                        $is = [
                                            'is_active' => 'primary',
                                            'is_hot' => 'danger',
                                            'is_good_deal' => 'warning',
                                            'is_show_home' => 'info',
                                        ];
                                    @endphp

                                    @foreach ($is as $key => $color)
                                        <div class="col-md-3">
                                            <div class="form-check form-switch form-switch-{{ $color }}">
                                                <input class="form-check-input" type="checkbox" role="switch"
                                                    name="{{ $key }}" value="1" id="{{ $key }}"
                                                    checked>
                                                <label class="form-check-label"
                                                    for="{{ $key }}">{{ \Str::convertCase($key, MB_CASE_TITLE) }}</label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="col-lg-12">
                                    <h1>Mô tả</h1>
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
                        <h4 class="card-title mb-0 flex-grow-1">Biến thể sản phẩm</h4>
                    </div>

                    @error('productVariant')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row">
                                <div class="col-lg-6">

                                    <h4>Chọn màu</h4>

                                    <select class="form-select" id="colorSelect" multiple
                                        aria-label="multiple select example">
                                        @foreach ($product_color as $id => $color)
                                            <option value="{{ $id }}">{{ $color }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="col-lg-6">

                                    <h4>Chọn kích thước</h4>

                                    <select class="form-select" id="sizeSelect" multiple
                                        aria-label="multiple select example">
                                        @foreach ($product_size as $id => $size)
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
                        <h4 class="card-title mb-0 flex-grow-1">Thư viện</h4>
                        <button type="button" class="btn btn-primary" onclick="addImageGallery()">Thêm ảnh</button>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4" id="gallery_list">
                                <div class="col-md-4" id="gallery_default_item">
                                    <label for="gallery_default" class="form-label">Ảnh sản phẩm</label>
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
                        <button class="btn btn-primary" type="submit">Thêm sản phẩm</button>
                    </div><!-- end card header -->
                </div>
            </div>
            <!--end col-->
        </div>
    </form>
@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <script src="https://cdn.ckeditor.com/ckeditor5/35.0.1/classic/ckeditor.js"></script>
@endsection

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
                                            <input type="text" class="form-control" name="productVariant[${index}]['size']" id="disabledInput" value="${variant.size.value}" hidden>
                                            <input type="text" class="form-control" name="productVariant[${index}]['color']" id="disabledInput" value="${variant.color.value}" hidden>
                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">Số lượng</label>
                                        <input type="number" class="form-control" name="productVariant[${index}]['quantity']" id="basiInput" >
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">Giá thường</label>
                                        <input type="number" class="form-control" name="productVariant[${index}]['price']" id="basiInput" >
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">Giá Sale</label>
                                        <input type="number" class="form-control" name="productVariant[${index}]['price_sale']" id="basiInput" >
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <label for="basiInput" class="form-label">SKU</label>
                                        <input type="text" class="form-control" name="productVariant[${index}]['SKU']" id="basiInput" >
                                    </div>

                                    <div class="col-xxl-3 col-md-6">
                                        <select class="form-select rounded-pill mb-3" name="productVariant[${index}]['is_active']" aria-label="Default select example">
                                            <option value="0">Active</option>
                                            <option value="1">In Active</option>
                                    </select>
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

    //preview image
    document.getElementById('thumbnail').addEventListener('change', function(event) {
        const [file] = event.target.files;
        if (file) {
            const preview = document.getElementById('preview-thumbnail');
            preview.src = URL.createObjectURL(file);
            preview.style.display = 'block';
        }
    });
</script>
@endsection
