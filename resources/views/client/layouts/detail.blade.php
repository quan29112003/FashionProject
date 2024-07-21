@include('client.partials.header')

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
                    <h3>{{ $product->name_product }} <span>Brand: {{ $product->brand }}</span></h3>
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
                    <div class="product__details__button">
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
                    </div>
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    <label for="stockin">
                                        @if ($product->is_in_stock)
                                            In Stock
                                        @else
                                            Out of Stock
                                        @endif
                                        <input type="checkbox" id="stockin"
                                            {{ $product->is_in_stock ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
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
                            data-setbg="{{ asset('uploads/' . $relatedProduct->images->first()->url) }}">
                            <ul class="product__hover">
                                <li><a href="{{ asset('uploads/' . $relatedProduct->images->first()->url) }}"
                                        class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a
                                    href="{{ route('detail', $relatedProduct->id) }}">{{ $relatedProduct->name_product }}</a>
                            </h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">
                                @if ($relatedProduct->price_sale)
                                    <span>{{ number_format($relatedProduct->price, 0, ',', '.') }}₫</span>
                                    {{ number_format($relatedProduct->price_sale, 0, ',', '.') }}₫
                                @elseif ($relatedProduct->price)
                                    {{ number_format($relatedProduct->price, 0, ',', '.') }}₫
                                @else
                                    <div class="product__price">Giá chưa cập nhật</div>
                                @endif
                            </div>

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
                        alert('Error adding product to cart.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    alert('Error adding product to cart.');
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
                    loadMoreBtn.style.display = 'none'; // Hide button when no more products to show
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

        function updatePrice() {
            const selectedColor = document.querySelector('input[name="color__radio"]:checked');
            const selectedSize = document.querySelector('input[name="size__radio"]:checked');

            if (!selectedColor || !selectedSize) {
                return; // Nếu chưa chọn đủ màu sắc và kích cỡ thì không làm gì cả
            }

            const colorId = selectedColor.value;
            const sizeId = selectedSize.value;

            // Gửi yêu cầu AJAX để lấy giá của biến thể sản phẩm
            fetch(`/getProductPrice?product_id=${productId}&color=${colorId}&size=${sizeId}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Invalid variant selected.');
                    }
                    return response.json();
                })
                .then(data => {
                    productPrice.innerHTML = `$${data.price} <span>$${data.price_sale}</span>`;
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

        // Cập nhật giá ban đầu khi tải trang
        updatePrice();
    });
</script>
