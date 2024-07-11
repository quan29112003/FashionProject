@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@include('client.partials.header')
<!-- Bao gồm header phần -->

<!-- Kết thúc phần danh mục -->

<!-- Bắt đầu phần sản phẩm -->
<section class="product spad">

    <div class="container">
        <!-- Container cho sản phẩm -->
        <div class="row">
            <!-- Tiêu đề phần -->

            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>{{ is_countable($products) ? count($products) : 0 }} kết quả cho “{{ $keyword }}”</h4>
                    <!-- Tiêu đề của phần sản phẩm -->
                </div>
            </div>

        </div>
        <div class="row">
            <!-- Tiêu đề phần -->

            <div class="col-lg-3">
                <form id="filterForm">
                    <p class="section-title">Bộ Lọc</p>
                    <div class="pt-3">
                        <select id="price" class="p-1 ml-2">
                            <option value="">Giá</option>
                            <option value="1">100k - 300k</option>
                            <option value="3">300k - 500k</option>
                            <option value="4">500k - ***k</option>
                        </select>
                    </div>
                    <div class="pt-3">
                        <select id="size" class="p-1 ml-2">
                            <option value="">Size</option>
                            @foreach ($sizes as $size)
                                <option value="{{ $size->id }}">{{ $size->size }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-3">
                        <select id="color" class="p-1 ml-2">
                            <option value="">Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}">{{ $color->color }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="pt-3">
                        <button type="submit" class="btn btn-secondary ml-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-filter" viewBox="0 0 16 16">
                                <path
                                    d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5">
                                </path>
                            </svg>
                        </button>
                    </div>
                </form>
                
            </div>
            <div class="col-lg-9" id="list_product">
                @php
                    $productCount = 0;
                @endphp

                <div class="row property__gallery" id="product-gallery">
                    <!-- Thư viện sản phẩm -->
                    @foreach ($products as $product)
                        <!-- Lặp qua các sản phẩm -->

                        {{-- @foreach ($product->variants as $variant) --}}
                        <!-- Lặp qua các biến thể của mỗi sản phẩm -->
                        <div class="col-lg-3 col-md-4 col-sm-6 mix @if ($productCount >= 8) d-none @endif">
                            <!-- Item sản phẩm với lớp điều kiện để giới hạn hiển thị -->
                            <div class="product__item">

                                @if (!empty($product->thumbnail))
                                    <!-- Kiểm tra xem sản phẩm có hình ảnh hay không -->
                                    <div class="product__item__pic set-bg"
                                        data-setbg={{ asset('uploads/' . $product->thumbnail) }}>

                                        {{-- <a href="{{ route('detail', $product->id) }}">
                                                <img src="{{ $product->images->first()->url }}"
                                                    alt="img product">
                                            </a> --}}

                                        <!-- Hình ảnh sản phẩm -->
                                        <ul class="product__hover">
                                            <!-- Các hành động khi hover -->

                                            <li>
                                                <a href="{{ asset('uploads/' . $product->thumbnail) }}"
                                                    class="image-popup">
                                                    <span class="arrow_expand"></span>
                                                </a>
                                            </li>
                                            <!-- Popup hình ảnh -->

                                            <li>
                                                <a href="#">
                                                    <span class="icon_heart_alt">
                                                    </span>
                                                </a>
                                            </li>
                                            <!-- Thêm vào danh sách yêu thích -->

                                            <li>
                                                <a href="#">
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

                                    <h6>
                                        <a
                                            href="{{ route('detail', $product['id']) }}">{{ $product['name_product'] }}</a>
                                    </h6>
                                    <!-- Tên sản phẩm -->

                                    <div class="rating">
                                        <!-- Đánh giá sản phẩm -->
                                        @for ($i = 0; $i < 5; $i++)
                                            <!-- Lặp để hiển thị sao đánh giá dựa trên rating -->
                                            @if ($i < $product['rating'])
                                                <i class="fa fa-star"></i>
                                                <!-- Sao đầy -->
                                            @else
                                                <i class="fa fa-star-o"></i>
                                                <!-- Sao rỗng -->
                                            @endif
                                        @endfor
                                    </div>
                                    @foreach ($product->variants as $variant)
                                        @if ($variant->price)
                                            <div class="product__price">${{ $variant->price }}</div>
                                            <!-- Giá sản phẩm -->
                                        @else
                                            <div class="product__price">Giá chưa cập nhật</div>
                                            <!-- Handle case where variant is null -->
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <!-- Tăng biến đếm sản phẩm -->
                        @php
                            $productCount++;
                        @endphp
                        {{-- @endforeach --}}
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
        </div>
    </div>
    <!-- Khởi tạo biến đếm sản phẩm -->





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
                                    <a href="{{ route('detail', $product->id) }}"><img
                                            src="{{ asset('uploads/' . $product->thumbnail) }}"
                                            alt="{{ $product->name_product }}"></a>
                                </div>
                                <div class="trend__item__text">
                                    <a href="{{ route('detail', $product->id) }}">
                                        <h6>{{ $product->name_product }}</h6>
                                    </a>
                                    <div class="rating">
                                        @for ($i = 0; $i < 5; $i++)
                                            <i class="fa fa-star{{ $i < $product->rating ? '' : '-o' }}"></i>
                                        @endfor
                                    </div>
                                    @if ($variant)
                                        <div class="product__price">${{ $variant->price }}</div>
                                        <!-- Giá sản phẩm -->
                                    @else
                                        <div class="product__price">Giá chưa cập nhật</div>
                                        <!-- Handle case where variant is null -->
                                    @endif
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
                                <a href="{{ route('detail', $product->id) }}"><img
                                        src="{{ asset('uploads/' . $product->thumbnail) }}"
                                        alt="{{ $product->name_product }}"></a>
                            </div>
                            <div class="trend__item__text">
                                <a href="{{ route('detail', $product->id) }}">
                                    <h6>{{ $product->name_product }}</h6>
                                </a>
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star{{ $i < $product->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                                @if ($variant)
                                    <div class="product__price">${{ $variant->price }}</div>
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

            <!-- Feature Section -->
            <div class="col-lg-4 col-md-4 col-sm-6">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Feature</h4>
                    </div>
                    @foreach ($featureProducts as $product)
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <a href="{{ route('detail', $product->id) }}"><img
                                        src="{{ asset('uploads/' . $product->thumbnail) }}"
                                        alt="{{ $product->name_product }}"></a>
                            </div>
                            <div class="trend__item__text">
                                <a href="{{ route('detail', $product->id) }}">
                                    <h6>{{ $product->name_product }}</h6>
                                </a>
                                <div class="rating">
                                    @for ($i = 0; $i < 5; $i++)
                                        <i class="fa fa-star{{ $i < $product->rating ? '' : '-o' }}"></i>
                                    @endfor
                                </div>
                                @if ($variant)
                                    <div class="product__price">${{ $variant->price }}</div>
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
<script>
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
</script>
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
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function() {
        // Handle form submission for search
        $('#filterForm').on('submit', function(event) {
            event.preventDefault();
            var urlParams = new URLSearchParams(window.location.search);
            var keyword = urlParams.get('keyword');
            var size = $('#size').val();
            var price = $('#price').val();
            var color = $('#color').val();
            searchProducts(keyword, size, price, color)
            // window.location.href = "/search/?keyword="+"&size="+size+"&price="+price+"&color="+color;
        });

        // Function to perform AJAX search
        function searchProducts(keyword, size, price, color) {
            $.ajax({
                url: '{{ route('api.product.search') }}',
                type: 'GET',
                data: {
                    keyword: keyword,
                    size: size,
                    price: price,
                    color: color
                },
                success: function(response) {
                    $('#list_product').html(response);
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        }
    });
</script>
