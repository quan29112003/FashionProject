@include('client.partials.header')
<!-- Bao gồm header phần -->

<div id="toast-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;"></div>


<!-- Bắt đầu phần danh mục -->
<section class="categories">
    <div class="container-fluid">
        <!-- Container full-width -->
        <div class="row">
            <!-- Phần danh mục đầu tiên (item lớn) -->
            <div class="col-lg-6 p-0">
                <div class="categories__item categories__large__item set-bg"
                    data-setbg="{{ asset('theme-cli/img/categories/category-1.jpg') }}">
                    <!-- Item danh mục lớn với hình nền được đặt thông qua thuộc tính data -->
                    <div class="categories__text">
                        <!-- Nội dung văn bản của danh mục -->
                        <h1>Thời trang nữ</h1>
                        <p>Sitamet, consectetur adipiscing elit, sed do eiusmod tempor incidid-unt labore
                            edolore magna aliquapendisse ultrices gravida.</p>
                        <!-- Mô tả danh mục -->
                        <a href="#">Mua ngay</a>
                        <!-- Nút mua ngay -->
                    </div>
                </div>
            </div>
            <!-- Phần danh mục nhỏ -->
            <div class="col-lg-6">
                <div class="row">
                    <!-- Lặp lại cho từng item danh mục nhỏ -->
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-2.jpg') }}">
                            <!-- Item danh mục nhỏ với hình nền -->
                            <div class="categories__text">
                                <!-- Nội dung văn bản của danh mục -->
                                <h4>Thời trang nam</h4>
                                <p>358 sản phẩm</p>
                                <a href="#">Mua ngay</a>
                                <!-- Nút mua ngay -->
                            </div>
                        </div>
                    </div>
                    <!-- Cấu trúc tương tự lặp lại cho các danh mục khác... -->
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-3.jpg') }}">
                            <div class="categories__text">
                                <h4>Thời trang trẻ em</h4>
                                <p>273 sản phẩm</p>
                                <a href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <!-- Các danh mục khác... -->
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-4.jpg') }}">
                            <div class="categories__text">
                                <h4>Mỹ phẩm</h4>
                                <p>159 sản phẩm</p>
                                <a href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 p-0">
                        <div class="categories__item set-bg"
                            data-setbg="{{ asset('theme-cli/img/categories/category-5.jpg') }}">
                            <div class="categories__text">
                                <h4>Phụ kiện</h4>
                                <p>792 sản phẩm</p>
                                <a href="#">Mua ngay</a>
                            </div>
                        </div>
                    </div>
                    <!-- Kết thúc các item danh mục nhỏ -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Kết thúc phần danh mục -->

<!-- Bắt đầu phần sản phẩm -->
<section class="product spad">

    <div class="container">
        <!-- Container cho sản phẩm -->
        <div class="row">
            <!-- Tiêu đề phần -->

            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Sản phẩm mới</h4>
                    <!-- Tiêu đề của phần sản phẩm -->
                </div>
            </div>

            <div class="col-lg-8 col-md-8">
                <ul class="filter__controls">
                    <!-- Category filter controls -->
                    <li class="active" data-filter="*">Tất cả</li>
                    @foreach ($categories as $category)
                        <li data-filter="{{ $category->id }}">{{ $category->name }}</li>
                    @endforeach
                </ul>
            </div>

            @php
                $productCount = 0;
            @endphp

            <div class="row property__gallery" id="product-gallery">
                <!-- Thư viện sản phẩm -->
                @foreach ($products as $product)
                    <!-- Lặp qua các sản phẩm -->
                    @php
                        $colors = $variantProducts[$product->id]->pluck('color')->unique();
                        $sizes = $variantProducts[$product->id]->pluck('size')->unique();
                        $selectedColorId = $colors->first() ? $colors->first()->id : null;
                    @endphp
                    @foreach ($product->variants as $variant)
                        <!-- Lặp qua các biến thể của mỗi sản phẩm -->
                        <div class="col-lg-3 col-md-4 col-sm-6 mix product-item @if ($productCount >= 8) d-none @endif"
                            data-category="{{ $product->category->id }}">
                            <!-- Item sản phẩm với lớp điều kiện để giới hạn hiển thị -->
                            <div class="product__item">

                                @if ($product->images->isNotEmpty())
                                    <!-- Kiểm tra xem sản phẩm có hình ảnh hay không -->
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ asset('uploads/' . $product->thumbnail) }}">
                                        <!-- Check if the product is new -->
                                        @if ($newProducts->contains($product))
                                            <div class="label new">New</div>
                                        @endif
                                        <!-- Check if the product is a good deal -->
                                        @if ($product->is_good_deal)
                                            <div class="label sale">Sale</div>
                                        @endif
                                        <!-- Check if the product is a hot trend -->
                                        @if ($product->is_hot)
                                            <div class="label sale">Hot Trend</div>
                                        @endif
                                        <a
                                            href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}">
                                            <img src="{{ asset('uploads/' . $product->thumbnail) }}" alt="img product">

                                        </a>

                                        <!-- Hình ảnh sản phẩm -->
                                        <ul class="product__hover pd-hover" id="product-hv-{{ $product->id }}">
                                            <!-- Các hành động khi hover -->

                                            <li>
                                                <a href="{{ asset('uploads/' . $product->thumbnail) }}"
                                                    class="image-popup">
                                                    <span class="arrow_expand"></span>
                                                </a>
                                            </li>
                                            <!-- Popup hình ảnh -->

                                            <li>
                                                <form id="wishlist-form-{{ $product->id }}"
                                                    action="{{ route('wishlist.add', $product->id) }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="#" onclick="addToWishlist({{ $product->id }});">
                                                    <span class="icon_heart_alt"></span>
                                                </a>
                                            </li>
                                            <!-- Thêm vào danh sách yêu thích -->

                                            <li>
                                                <a onclick="handleQuickCard(event,{{ $product->id }})" href="#">
                                                    <span class="icon_bag_alt">

                                                    </span>
                                                </a>
                                            </li>
                                            <!-- Thêm vào giỏ hàng -->

                                        </ul>

                                    </div>
                                @endif
                                <div class="product__item__text">
                                    <!-- Chi tiết sản phẩm -->
                                    <div class="swatch-attribute-options-{{ $product->id }}">
                                        @foreach ($colors as $color)
                                            <div onclick="getSizeByColor(event,{{ $color->id }},{{ $product->id }})"
                                                class="swatch-option color {{ $color->id == $selectedColorId ? 'selected' : '' }}"
                                                data-color-id="{{ $color->id }}"
                                                id="swichcolor-{{ $color->id }}-{{ $product->id }}"
                                                style="background-color: {{ $color->color_code }}"></div>
                                        @endforeach
                                    </div>
                                    <h6><a
                                            href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}">{{ $product->name_product }}</a>
                                    </h6>

                                    <!-- Tên sản phẩm -->
                                    <div class="rating">
                                        <!-- Đánh giá sản phẩm -->
                                        @for ($i = 0; $i < 5; $i++)
                                            <!-- Lặp để hiển thị sao đánh giá dựa trên rating -->
                                            @if ($i < $product->rating)
                                                <i class="fa fa-star"></i>
                                                <!-- Sao đầy -->
                                            @else
                                                <i class="fa fa-star-o"></i>
                                                <!-- Sao rỗng -->
                                            @endif
                                        @endfor
                                    </div>

                                    @if ($variant)
                                        <div class="product__price">
                                            @if ($product->is_good_deal)
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

                        <!-- Tăng biến đếm sản phẩm -->
                        @php
                            $productCount++;
                        @endphp
                    @endforeach
                @endforeach
            </div>


            <!-- Nút Xem Thêm -->
            <div class="col-lg-12 text-center">
                <button id="load-more-btn" class="btn btn-primary @if ($productCount <= 8) d-none @endif">
                    Xem thêm
                </button>
                <!-- Nút Xem Thêm, ẩn nếu số sản phẩm là 12 hoặc ít hơn -->
            </div>

        </div>

</section>
<!-- Product Section End -->

<!-- Banner Section Begin -->
<section class="banner set-bg" data-setbg="{{ asset('theme-cli/img/banner/banner-1.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-8 m-auto">
                <div class="banner__slider owl-carousel">
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                    <div class="banner__item">
                        <div class="banner__text">
                            <span>The Chloe Collection</span>
                            <h1>The Project Jacket</h1>
                            <a href="{{ route('shop') }}">Shop now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->


<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <!-- Hot Trend Section -->
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Hot Trend</h4>
                    </div>
                    @foreach ($hotTrendProducts as $product)
                        @foreach ($product->variants as $variant)
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <a
                                        href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}"><img
                                            src="{{ asset('uploads/' . $product->images->first()->url) }}"
                                            alt="{{ $product->name_product }}"></a>
                                </div>
                                <div class="trend__item__text">
                                    <a
                                        href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}">
                                        <h6>{{ $product->name_product }}</h6>
                                    </a>
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fa fa-star{{ $i < $product->rating ? '' : '-o' }}"></i>
                                        @endfor
                                    </div>
                                    <div class="product__price">${{ number_format($variant->price, 0, ',', '.') }}
                                    </div>
                                    <!-- Giá sản phẩm -->
                                </div>
                            </div>
                        @endforeach
                    @endforeach
                </div>
            </div>

            <!-- Best Seller Section -->
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Best Seller</h4>
                    </div>
                    @foreach ($bestSellerProducts as $product)
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <a
                                    href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}"><img
                                        src="{{ asset('uploads/' . $product->images->first()->url) }}"
                                        alt="{{ $product->name_product }}"></a>
                            </div>
                            <div class="trend__item__text">
                                <a
                                    href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}">
                                    <h6>{{ $product->name_product }}</h6>
                                </a>
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star{{ $i < $product->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                                <div class="product__price">${{ number_format($variant->price, 0, ',', '.') }}</div>
                                <!-- Giá sản phẩm -->
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Feature Section -->
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Feature</h4>
                    </div>
                    @foreach ($featureProducts as $product)
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <a
                                    href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}"><img
                                        src="{{ asset('uploads/' . $product->images->first()->url) }}"
                                        alt="{{ $product->name_product }}"></a>
                            </div>
                            <div class="trend__item__text">
                                <a
                                    href="{{ route('detail', ['id' => $product->id, 'name' => str_replace(' ', '-', strtolower($product->name_product))]) }}">
                                    <h6>{{ $product->name_product }}</h6>
                                </a>
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star{{ $i < $product->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                                @if ($variant)
                                    <div class="product__price">${{ number_format($variant->price, 0, ',', '.') }}
                                    </div>
                                    <!-- Giá sản phẩm -->
                                @else
                                    <div class="product__price">Giá chưa cập nhật</div>
                                    <!-- Handle case where variant is null -->
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->

<!-- Discount Section Begin -->
<section class="discount">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 p-0">
                <div class="discount__pic">
                    <img src="{{ asset('theme-cli/img/discount.jpg') }}" alt="">
                </div>
            </div>
            <div class="col-lg-6 p-0">
                <div class="discount__text">
                    <div class="discount__text__title">
                        <span>Discount</span>
                        <h2>Summer 2024</h2>
                        <h5><span>Sale</span> 50%</h5>
                    </div>
                    <div class="discount__countdown" id="countdown-time">
                        <div class="countdown__item">
                            <span>22</span>
                            <p>Days</p>
                        </div>
                        <div class="countdown__item">
                            <span>18</span>
                            <p>Hour</p>
                        </div>
                        <div class="countdown__item">
                            <span>46</span>
                            <p>Min</p>
                        </div>
                        <div class="countdown__item">
                            <span>05</span>
                            <p>Sec</p>
                        </div>
                    </div>
                    <a href="{{ route('shop') }}">Shop now</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Discount Section End -->

<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Free Shipping</h6>
                    <p>For all oder over $99</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Money Back Guarantee</h6>
                    <p>If good have Problems</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Online Support 24/7</h6>
                    <p>Dedicated support</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Payment Secure</h6>
                    <p>100% secure payment</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->


<!-- Phần còn lại của template -->

@include('client.partials.footer')
<!-- Bao gồm template phần footer -->

<!-- Scripts cho chức năng lọc -->
{{-- <script>
    document.addEventListener('DOMContentLoaded', function() {
        const filterControls = document.querySelectorAll('.filter__controls li');
        const products = document.querySelectorAll('.mix');

        filterControls.forEach(control => {
            control.addEventListener('click', function() {
                filterControls.forEach(ctrl => ctrl.classList.remove('active'));
                this.classList.add('active');

                const filter = this.getAttribute('data-filter');
                products.forEach(product => {
                    if (filter === '*' || product.classList.contains(filter.slice(1))) {
                        product.style.display = 'block';
                    } else {
                        product.style.display = 'none';
                    }
                });
            });
        });
    });

    // Script để đặt hình nền động
    document.querySelectorAll('.set-bg').forEach(el => {
        const bg = el.getAttribute('data-setbg');
        el.style.backgroundImage = `url(${bg})`;
    });
</script> --}}
<!-- Script để lọc sản phẩm theo danh mục -->

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('load-more-btn');
        const hiddenProducts = document.querySelectorAll('.property__gallery .mix.d-none');
        let currentCount = 0;

        loadMoreBtn.addEventListener('click', function() {
            for (let i = currentCount; i < currentCount + 8; i++) {
                if (hiddenProducts[i]) {
                    hiddenProducts[i].classList.remove('d-none');
                } else {
                    loadMoreBtn.style.display = 'none'; // Ẩn nút khi không còn sản phẩm để hiển

                    break;
                }
            }
            currentCount += 8;
        });
    });
    $('.product__hover').each(function() {
        var $this = $(this);
        var originProductHover = $this.html();
        $this.data('originalContent', originProductHover);
    });

    $(".product__item").hover(
        function() {
            $(this).find(".pd-hover").show();
        },
        function() {
            var $pdHover = $(this).find(".pd-hover");
            var originalContent = $pdHover.closest('.product__item').find('.product__hover').data(
                'originalContent');

            $pdHover.html(originalContent);
            $pdHover.hide();
        }
    );

    function handleQuickCard(e, id, colorId = 0) {
        e.preventDefault();
        $(`.swatch-attribute-options-${id}`).children().each(function() {
            if ($(this).hasClass("selected")) {
                colorId = $(this).attr("data-color-id")
            }
        })

        let htmlContent = '';
        $.ajax({
            url: "{{ route('getSizeProduct') }}",
            method: "post",
            data: {
                _token: "{{ csrf_token() }}",
                color_id: colorId,
                product_id: id,
            },
            success: function(r) {
                Object.entries(r.size).forEach(([k, e]) => {
                    htmlContent += `<li>
                        <a href="/cart/add?product_id=${id}&variant_id=${k}" class="quick-tocard">
                            ${e.size}
                            </a>
                        </li>`;
                });
                $(`#product-hv-${id}`).html(htmlContent);
                $(".quick-tocard").on("click", function(e) {
                    e.preventDefault();
                    $.ajax({
                        url: $(this).attr("href"),
                        method: "post",
                        data: {
                            _token: "{{ csrf_token() }}"
                        },
                        success: function() {
                            location.href = "/cart";
                        },
                        error: function(e) {
                            console.error(e)
                        }
                    })
                })

            },
            error: function(e) {
                console.error(e)
            }
        })

    }

    function getSizeByColor(e, colorId, productId) {
        e.preventDefault();
        const currentElement = $(`#swichcolor-${colorId}-${productId}`);
        currentElement.parent().children().each(function() {
            if ($(this).hasClass("selected")) {
                $(this).removeClass("selected")
            }
        })
        currentElement.addClass("selected")
        handleQuickCard(e, productId)
    }

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

        // Append toast to container and show it
        toastContainer.append(toast);
        var bootstrapToast = new bootstrap.Toast(toast[0], {
            delay: autoHideDelay
        });
        bootstrapToast.show();

        // Remove toast after it's hidden
        toast.on('hidden.bs.toast', function() {
            toast.remove();
        });
    }
</script>


<script>
    $(document).ready(function() {
        $('.filter__controls li').click(function() {
            var filterValue = $(this).attr('data-filter');

            if (filterValue == '*') {
                $('.product-item').show();
            } else {
                $('.product-item').hide();
                $('.product-item[data-category="' + filterValue + '"]').show();
            }

            $('.filter__controls li').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>
