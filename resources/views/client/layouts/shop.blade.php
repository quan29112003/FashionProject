@include('client.partials.header')
<!-- Header Section End -->

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
                    <span>Shop</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Section Begin -->
<section class="shop spad">
    <div class="container">
        <div class="row">
            <!-- Sidebar Begin -->
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">

                    <!-- Categories Section -->
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>

                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">

                                @foreach ($categories as $category)
                                    <div class="card">
                                        <div class="card-heading">
                                            <a href="#category-{{ $category->id }}" data-toggle="collapse" data-target="#category-{{ $category->id }}">
                                                {{ $category->name }}
                                            </a>
                                        </div>
                                        {{-- Uncomment to enable subcategories
                                        <div id="category-{{ $category->id }}" class="collapse" data-parent="#accordionExample">
                                            <div class="card-body">
                                                <ul>
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <li><a href="{{ route('shop.category', $subcategory->id) }}">{{ $subcategory->name }}</a></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div> --}}
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </div>

                    <!-- Price Filter Section -->
                    <div class="sidebar__filter">
                        <div class="section-title">
                            <h4>Shop by price</h4>
                        </div>

                        <div class="filter-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" id="slider-range"></div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <p>Price:</p>
                                    <input type="text" id="minamount">
                                    <input type="text" id="maxamount">
                                </div>
                            </div>
                        </div>

                        <button id="filter-btn" class="site-btn">Filter</button>
                    </div>

                    <!-- Size Filter Section -->
                    <div class="sidebar__sizes">
                        <div class="section-title">
                            <h4>Shop by size</h4>
                        </div>
                        <div class="size__list">

                            @foreach ($sizes as $size)
                                <label for="size-{{ $size->id }}">
                                    {{ $size->size }}
                                    <input type="checkbox" id="size-{{ $size->id }}" class="size-filter"
                                        data-size="{{ $size->size }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach

                        </div>
                    </div>


                    <!-- Color Filter Section -->
                    <div class="sidebar__color">
                        <div class="section-title">
                            <h4>Shop by color</h4>
                        </div>
                        <div class="size__list color__list">

                            @foreach ($colors as $color)
                                <label for="color-{{ $color->id }}">
                                    {{ $color->color }}
                                    <input type="checkbox" id="color-{{ $color->id }}" class="color-filter"
                                        data-color="{{ $color->color }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach

                        </div>
                    </div>

                </div>
            </div>
            <!-- Sidebar End -->

            <!-- Products Section Begin -->
            <div class="col-lg-9 col-md-9">
                <!-- Sorting Filter -->
                <div class="shop__sorting">
                    <select id="sort-by" class="form-control">
                        <option value="newest">Newest to Oldest</option>
                        <option value="oldest">Oldest to Newest</option>
                        <option value="name_asc">Name: A to Z</option>
                        <option value="name_desc">Name: Z to A</option>
                    </select>
                </div>

                <div class="row" id="product-list">
                    @php
                        $productCount = 0;
                    @endphp

                    @foreach ($products as $product)
                        @foreach ($product->variants as $variant)
                            <div class="col-lg-4 col-md-6 product-item @if ($productCount >= 12) d-none @endif">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('uploads/' . $product->thumbnail) }}">
                                        <ul class="product__hover">
                                            <li><a href="{{ asset('uploads/' . $product->thumbnail) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                            <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                                        </ul>

                                    </div>

                                    <div class="product__item__text">
                                        <h6><a href="{{ route('detail', $product->id) }}">{{ $product->name_product }}</a></h6>
                                        <div class="rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product__price">{{ number_format($variant->price, 0, ',', '.') ?? 'Price not available' }}đ</div>
                                    </div>

                                </div>
                            </div>
                            @php
                                $productCount++;
                            @endphp
                        @endforeach
                    @endforeach
                </div>
                <!-- Load More Button -->
                <div class="col-lg-12 text-center">
                    <button id="load-more-btn"
                        class="btn btn-primary @if ($productCount <= 12) d-none @endif">Xem thêm</button>
                </div>
            </div>
            <!-- Products Section End -->
        </div>
    </div>
</section>
<!-- Shop Section End -->

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

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <!-- Instagram Images -->
        </div>
    </div>
</div>
<!-- Instagram End -->




<!-- Footer Section Begin -->
@include('client.partials.footer')
<!-- Footer Section End -->

<!-- Include jQuery UI for slider -->
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

{{-- <script>
    $(function() {
        var minPrice = {{ request()->get('min_price', 0) }};
        var maxPrice = {{ request()->get('max_price', 500) }};
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 500,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#minamount").val(ui.values[0]);
                $("#maxamount").val(ui.values[1]);
            }
        });
        $("#minamount").val($("#slider-range").slider("values", 0));
        $("#maxamount").val($("#slider-range").slider("values", 1));

        // Khai báo các biến để lưu trữ selected colors và sizes
        var selectedColors = [];
        var selectedSizes = [];

        // Xử lý sự kiện khi checkbox color thay đổi
        $('.color-filter').on('change', function() {
            selectedColors = []; // Đặt lại mảng selectedColors
            $('.color-filter:checked').each(function() {
                selectedColors.push($(this).data('color'));
            });
        });

        // Xử lý sự kiện khi checkbox size thay đổi
        $('.size-filter').on('change', function() {
            selectedSizes = []; // Đặt lại mảng selectedSizes
            $('.size-filter:checked').each(function() {
                selectedSizes.push($(this).data('size'));
            });
        });

        // Xử lý sự kiện khi click vào nút filter-btn
        $('#filter-btn').on('click', function() {
            var min = $("#minamount").val();
            var max = $("#maxamount").val();
            var url = new URL(window.location.href);

            url.searchParams.set('min_price', min);
            url.searchParams.set('max_price', max);
            url.searchParams.set('colors', selectedColors.join(','));
            url.searchParams.set('sizes', selectedSizes.join(','));

            window.location.href = url.toString();
        });

        // Sorting filter
        $('#sort-by').on('change', function() {
            var sortBy = $(this).val();
            var url = new URL(window.location.href);
            url.searchParams.set('sort_by', sortBy);
            window.location.href = url.toString();
        });
    });
</script> --}}



<script>
    $(function() {
        // Lấy giá trị min_price, max_price, colors và sizes từ các query parameter
        var minPrice = {{ request()->get('min_price', 0) }};
        var maxPrice = {{ request()->get('max_price', 10000000) }};
        var selectedColors = '{{ request()->get('colors', '') }}'.split(',');
        var selectedSizes = '{{ request()->get('sizes', '') }}'.split(',');

        // Thiết lập slider cho phần chọn khoảng giá
        $("#slider-range").slider({
            range: true,
            min: 0,
            max: 10000000,
            values: [minPrice, maxPrice],
            slide: function(event, ui) {
                $("#minamount").val(ui.values[0]);
                $("#maxamount").val(ui.values[1]);
            }
        });

        // Thiết lập giá trị ban đầu cho input minamount và maxamount
        $("#minamount").val($("#slider-range").slider("values", 0));
        $("#maxamount").val($("#slider-range").slider("values", 1));

        // Đặt lại trạng thái checked cho các checkbox color dựa trên selectedColors
        $('.color-filter').each(function() {
            var color = $(this).data('color');
            if (selectedColors.includes(color)) {
                $(this).prop('checked', true);
            }
        });

        // Đặt lại trạng thái checked cho các checkbox size dựa trên selectedSizes
        $('.size-filter').each(function() {
            var size = $(this).data('size');
            if (selectedSizes.includes(size)) {
                $(this).prop('checked', true);
            }
        });

        // Xử lý sự kiện khi checkbox color thay đổi
        $('.color-filter').on('change', function() {
            selectedColors = []; // Đặt lại mảng selectedColors
            $('.color-filter:checked').each(function() {
                selectedColors.push($(this).data('color'));
            });
        });

        // Xử lý sự kiện khi checkbox size thay đổi
        $('.size-filter').on('change', function() {
            selectedSizes = []; // Đặt lại mảng selectedSizes
            $('.size-filter:checked').each(function() {
                selectedSizes.push($(this).data('size'));
            });
        });

        // Xử lý sự kiện khi click vào nút filter-btn
        $('#filter-btn').on('click', function() {
            var min = $("#minamount").val();
            var max = $("#maxamount").val();
            var url = new URL(window.location.href);

            url.searchParams.set('min_price', min);
            url.searchParams.set('max_price', max);
            url.searchParams.set('colors', selectedColors.join(','));
            url.searchParams.set('sizes', selectedSizes.join(','));

            window.location.href = url.toString();
        });

        // Sorting filter
        // Lấy giá trị sort_by từ query parameter
        var sortBy = '{{ request()->get('sort_by', '') }}';

        // Thiết lập giá trị ban đầu cho select box sort-by
        $('#sort-by').val(sortBy);

        // Xử lý sự kiện khi select box sort-by thay đổi
        $('#sort-by').on('change', function() {
            var sortBy = $(this).val();
            var url = new URL(window.location.href);
            url.searchParams.set('sort_by', sortBy);
            window.location.href = url.toString();
        });
    });
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const loadMoreBtn = document.getElementById('load-more-btn');
        const hiddenProducts = document.querySelectorAll('.product-item.d-none');
        let currentCount = 0;

        loadMoreBtn.addEventListener('click', function() {
            for (let i = currentCount; i < currentCount + 12; i++) {
                if (hiddenProducts[i]) {
                    hiddenProducts[i].classList.remove('d-none');
                } else {
                    loadMoreBtn.style.display = 'none'; // Hide button when no more products to show
                    break;
                }
            }
            currentCount += 12;
        });
    });
</script>
