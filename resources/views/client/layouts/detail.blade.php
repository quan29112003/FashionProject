@include('client.partials.header')

<style>
    /* CSS cho nút bình thường */
    .site-btn {
        color: white;
        /* Màu chữ */
        border: none;
        /* Không có viền */
        padding: 10px 20px;
        /* Khoảng cách nội dung */
        cursor: pointer;
        /* Con trỏ chuột */
        transition: background-color 0.3s ease;
        /* Hiệu ứng chuyển màu nền */
    }

    /* CSS cho nút khi bị vô hiệu hóa */
    .site-btn:disabled,
    .site-btn[disabled] {
        background-color: #cccccc;
        /* Màu nền khi vô hiệu hóa */
        color: #666666;
        /* Màu chữ khi vô hiệu hóa */
        cursor: not-allowed;
        /* Con trỏ chuột khi vô hiệu hóa */
        opacity: 0.5;
        /* Độ mờ khi vô hiệu hóa */
    }
</style>


<div id="toast-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;"></div>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>{{ $product->name_product }}</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        @foreach ($images as $image)
                            <a class="pt" href="#product-{{ $loop->iteration }}">
                                <img src="{{ asset('uploads/' . $image->url) }}" alt="Product Thumbnail">
                            </a>
                        @endforeach
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach ($images as $image)
                                <img data-hash="product-{{ $loop->iteration }}" class="product__big__img"
                                    src="{{ asset('uploads/' . $image->url) }}" alt="{{ $product->name_product }}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text" data-product-id="{{ $product->id }}">
                    <h3>{{ $product->name_product }} <span>Brand: {{ $product->catalogue_id }}</span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>(138 reviews)</span>
                    </div>
                    <div class="product__details__price" id="productPrice">{{ number_format($price, 0, ',', '.') }}₫
                        <span>{{ number_format($price_sale, 0, ',', '.') }}₫</span>
                    </div>
                    <!-- Widget thêm vào giỏ hàng -->
                    {{-- <div class="product__details__button">
                        <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            @if (isset($variant))
                                <input type="hidden" name="variant_id" value="{{ $variant->id }}">
                            @endif
                            <div class="quantity">
                                <span>Quantity:</span>
                                <div class="pro-qty">
                                    <input type="text" name="quantity" value="1">
                                </div>
                            </div>
                            <button type="submit" class="site-btn">Add to cart</button>
                        </form>
                    </div> --}}
                    <form id="add-to-cart-form" action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <input type="hidden" name="variant_id" id="variant_id">
                        <input type="hidden" name="color_id" id="color_id">
                        <input type="hidden" name="size_id" id="size_id">
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="pro-qty">
                                <input type="text" name="quantity" value="1">
                            </div>
                        </div>
                        <button type="submit" id="add-to-cart-btn" class="site-btn" disabled>Add to cart</button>
                    </form>

                    <br>

                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    {{ $variant->quantity }}
                                </div>
                            </li>
                            <li>
                                <span>Category:</span> {{ $category }}
                            </li>
                            <li>
                                <span>Available color:</span>
                                <div class="color__checkbox">
                                    @foreach ($colors as $color)
                                        <label for="color_{{ $color->id }}" class="color-label">
                                            <input type="radio" name="color__radio" id="color_{{ $color->id }}"
                                                value="{{ $color->id }}"
                                                {{ $color->id == $selectedColorId ? 'checked' : '' }}>
                                            <span class="checkmark"
                                                style="background-color: {{ $color->color_code }}; border:1px solid black;"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <span>Available size:</span>
                                <div class="size__btn">
                                    @foreach ($sizes as $size)
                                        <label for="size_{{ $size->id }}" class="size-label">
                                            <input type="radio" name="size__radio" id="size_{{ $size->id }}"
                                                value="{{ $size->id }}"
                                                {{ $size->id == $selectedSizeId ? 'checked' : '' }}>
                                            {{ $size->size }}
                                        </label>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <span>Promotions:</span>
                                <p>Free shipping</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Specification</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Description</h6>
                            <p>{{ $product->description }}</p>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Specification</h6>
                            <p>{{ $product->specification }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="related__title">
                    <h5>RELATED PRODUCTS</h5>
                </div>
            </div>
            @php
                $productCount = 0;
            @endphp
            @foreach ($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-4 col-sm-6 product-item @if ($productCount >= 8) d-none @endif">
                    <div class="product__item">
                        <div class="product__item__pic set-bg"
                            data-setbg="{{ asset('uploads/' . optional($relatedProduct->images->first())->url) }}">
                            <!-- Check if the product is new -->
                            @if ($newProducts->contains($relatedProduct))
                                <div class="label new">New</div>
                            @endif
                            <!-- Check if the product is a good deal -->
                            @if ($relatedProduct->is_good_deal)
                                <div class="label sale">Sale</div>
                            @endif
                            <!-- Check if the product is a hot trend -->
                            @if ($product->is_hot)
                                <div class="label sale">Hot Trend</div>
                            @endif
                            <ul class="product__hover">
                                <li>
                                    <a href="{{ asset('uploads/' . optional($relatedProduct->images->first())->url) }}"
                                        class="image-popup">
                                        <span class="arrow_expand"></span>
                                    </a>
                                </li>

                                <li>
                                    <form id="wishlist-form-{{ $relatedProduct->id }}"
                                        action="{{ route('wishlist.add', $relatedProduct->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    <a href="#" onclick="addToWishlist({{ $relatedProduct->id }});">
                                        <span class="icon_heart_alt"></span>
                                    </a>
                                </li>
                                <!-- Thêm vào danh sách yêu thích -->
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a
                                    href="{{ route('detail', ['id' => $relatedProduct->id, 'name' => str_replace(' ', '-', strtolower($relatedProduct->name_product))]) }}">{{ $relatedProduct->name_product }}</a>
                            </h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            @if ($variant)
                                <div class="product__price">
                                    @if ($relatedProduct->is_good_deal)
                                        <h6 style="color: red; font-weight: bold;">
                                            {{ number_format($variant->price, 0, ',', '.') }}đ</h6>
                                        <span>{{ number_format($variant->price_sale, 0, ',', '.') }}đ</span>
                                    @else
                                        {{ number_format($variant->price, 0, ',', '.') }}đ
                                    @endif
                                </div>
                                <!-- Giá sản phẩm -->
                            @else
                                <div class="product__price">Giá chưa cập nhật</div>
                                <!-- Handle case where variant is null -->
                            @endif

                        </div>
                    </div>
                </div>
                @php
                    $productCount++;
                @endphp
            @endforeach
        </div>
        <div class="col-lg-12 text-center">
            <button id="load-more-btn" class="btn btn-primary @if ($productCount <= 8) d-none @endif">
                Xem thêm
            </button>
        </div>
</section>
<!-- Product Details Section End -->



@include('client.partials.footer')
<script>
    $(document).ready(function() {
        $('#add-to-cart-form').on('submit', function(event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    if (response.success) {
                        window.location.href = '{{ route('cart.index') }}';
                    } else {
                        alert('Sản phẩm đã hết hàng, vui lòng chọn màu/size khác.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    alert('Sản phẩm đã hết hàng, vui lòng chọn màu/size khác.');
                }
            });
        });
    });
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('load-more-btn');
        const hiddenProducts = document.querySelectorAll('.product-item.d-none');
        let currentCount = 0;

        loadMoreBtn.addEventListener('click', function() {
            const maxToShow = 8;
            for (let i = currentCount; i < currentCount + maxToShow; i++) {
                if (hiddenProducts[i]) {
                    hiddenProducts[i].classList.remove('d-none');
                } else {
                    loadMoreBtn.style.display = 'none';
                    break;
                }
            }
            currentCount += maxToShow;
        });

        const colorRadios = document.querySelectorAll('input[name="color__radio"]');
        const sizeRadios = document.querySelectorAll('input[name="size__radio"]');
        const productPrice = document.getElementById('productPrice');
        const productDetails = document.querySelector('.product__details__text');
        const productId = productDetails.dataset.productId;

        function numberFormat(number, decimals, decPoint, thousandsSep) {
            number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
            const n = !isFinite(+number) ? 0 : +number;
            const prec = !isFinite(+decimals) ? 0 : Math.abs(decimals);
            const sep = (typeof thousandsSep === 'undefined') ? ',' : thousandsSep;
            const dec = (typeof decPoint === 'undefined') ? '.' : decPoint;
            let s = '';

            const toFixedFix = function(n, prec) {
                const k = Math.pow(10, prec);
                return '' + (Math.round(n * k) / k).toFixed(prec);
            };

            s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
            if (s[0].length > 3) {
                s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
            }
            if ((s[1] || '').length < prec) {
                s[1] = s[1] || '';
                s[1] += new Array(prec - s[1].length + 1).join('0');
            }
            return s.join(dec);
        }

        function updatePrice() {
            const selectedColor = document.querySelector('input[name="color__radio"]:checked');
            const selectedSize = document.querySelector('input[name="size__radio"]:checked');

            if (!selectedColor || !selectedSize) {
                return;
            }

            const colorId = selectedColor.value;
            const sizeId = selectedSize.value;

            productPrice.innerHTML = 'Loading...';

            fetch(`/getProductPrice?product_id=${productId}&color=${colorId}&size=${sizeId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Invalid variant selected.');
                    }
                    return response.json();
                })
                .then(data => {
                    const formattedPrice = numberFormat(data.price, 0, ',', '.') + '₫';
                    const formattedPriceSale = data.price_sale ? numberFormat(data.price_sale, 0, ',',
                        '.') + '₫' : '';
                    productPrice.innerHTML = `${formattedPrice} <span>${formattedPriceSale}</span>`;
                })
                .catch(error => {
                    console.error('Error fetching price:', error);
                    productPrice.innerHTML = 'Hết hàng';
                });
        }

        colorRadios.forEach(radio => {
            radio.addEventListener('change', updatePrice);
        });

        sizeRadios.forEach(radio => {
            radio.addEventListener('change', updatePrice);
        });

        updatePrice();
    });
</script>

<script>
    function showToast(message, type) {
        var toastContainer = $('#toast-container');
        var autoHideDelay = 3000; // 3 seconds

        var toastClass = 'bg-' + (type === 'success' ? 'success' : 'danger');
        var toast = $('<div class="toast text-white ' + toastClass +
            '" role="alert" aria-live="assertive" aria-atomic="true">' +
            '<div class="toast-header">' +
            '<strong class="me-auto">Notification</strong>' +
            '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
            '</div>' +
            '<div class="toast-body">' + message + '</div>' +
            '</div>');

        toastContainer.append(toast);
        var bootstrapToast = new bootstrap.Toast(toast[0], {
            delay: autoHideDelay
        });
        bootstrapToast.show();

        toast.on('hidden.bs.toast', function() {
            toast.remove();
        });
    }

    function addToWishlist(productId) {
        event.preventDefault();
        var form = $('#wishlist-form-' + productId);

        $.ajax({
            url: form.attr('action'),
            method: form.attr('method'),
            data: form.serialize(),
            success: function(response) {
                showToast('Product added to wishlist!', 'success');
            },
            error: function(response) {
                if (response.status === 400) {
                    showToast('Product is already in the wishlist.', 'danger');
                } else {
                    showToast('Failed to add product to wishlist.', 'danger');
                }
            }
        });
    }
</script>
<script>
    $(document).ready(function() {
        function updateVariantInfo() {
            var selectedColorId = $('input[name="color__radio"]:checked').val();
            var selectedSizeId = $('input[name="size__radio"]:checked').val();
            var productId = $('.product__details__text').data('product-id');

            if (selectedColorId && selectedSizeId) {
                $.ajax({
                    url: '{{ route('get-variant-id') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        product_id: productId,
                        color_id: selectedColorId,
                        size_id: selectedSizeId
                    },
                    success: function(response) {
                        if (response.variant_id) {
                            $('#variant_id').val(response.variant_id);
                            $('#add-to-cart-btn').prop('disabled', false);
                        } else {
                            $('#add-to-cart-btn').prop('disabled', true);
                        }
                    }
                });
            }
        }

        $('input[name="color__radio"], input[name="size__radio"]').on('change', function() {
            updateVariantInfo();
        });

        updateVariantInfo();
    });

    document.addEventListener('DOMContentLoaded', function() {
        const colorRadios = document.querySelectorAll('input[name="color__radio"]');
        const sizeRadios = document.querySelectorAll('input[name="size__radio"]');
        const variantIdInput = document.getElementById('variant_id');
        const colorIdInput = document.getElementById('color_id');
        const sizeIdInput = document.getElementById('size_id');
        const addToCartBtn = document.getElementById('add-to-cart-btn');
        const productId = document.querySelector('.product__details__text').dataset.productId;

        function updateVariantId() {
            const selectedColor = document.querySelector('input[name="color__radio"]:checked');
            const selectedSize = document.querySelector('input[name="size__radio"]:checked');

            if (!selectedColor || !selectedSize) {
                addToCartBtn.disabled = true;
                return;
            }

            const colorId = selectedColor.value;
            const sizeId = selectedSize.value;

            colorIdInput.value = colorId;
            sizeIdInput.value = sizeId;

            fetch(`/getVariantId?product_id=${productId}&color_id=${colorId}&size_id=${sizeId}`)
                .then(response => response.json())
                .then(data => {
                    if (data.variant_id) {
                        variantIdInput.value = data.variant_id;
                        addToCartBtn.disabled = false; // Kích hoạt nút nếu tìm thấy variant
                    } else {
                        addToCartBtn.disabled = true; // Vô hiệu hóa nút nếu không tìm thấy variant
                        // alert('Variant not found for the selected color and size.');
                    }
                })
                .catch(error => {
                    console.error('Error fetching variant:', error);
                    addToCartBtn.disabled = true; // Vô hiệu hóa nút khi có lỗi
                });
        }

        colorRadios.forEach(radio => {
            radio.addEventListener('change', updateVariantId);
        });

        sizeRadios.forEach(radio => {
            radio.addEventListener('change', updateVariantId);
        });

        // Cập nhật variant_id khi trang tải xong
        updateVariantId();
    });
</script>
