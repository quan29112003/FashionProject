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
            <div class="col-lg-3 col-md-3">
                <div class="shop__sidebar">
                    <div class="sidebar__categories">
                        <div class="section-title">
                            <h4>Categories</h4>
                        </div>
                        <div class="categories__accordion">
                            <div class="accordion" id="accordionExample">
                                @foreach ($categories as $category)
                                    <div class="card">
                                        <div class="card-heading">
                                            <a href="#category-{{ $category->id }}" data-toggle="collapse"
                                                data-target="#category-{{ $category->id }}">
                                                {{ $category->name }}
                                            </a>
                                        </div>
                                        {{-- <div id="category-{{ $category->id }}" class="collapse" data-parent="#accordionExample">
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
                    <div class="sidebar__filter">
                        <div class="section-title">
                            <h4>Shop by price</h4>
                        </div>
                        <div class="filter-range-wrap">
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                id="slider-range"></div>
                            <div class="range-slider">
                                <div class="price-input">
                                    <p>Price:</p>
                                    <input type="text" id="minamount" readonly>
                                    <input type="text" id="maxamount" readonly>
                                </div>
                            </div>
                        </div>
                        <button id="filter-btn" class="site-btn">Filter</button>
                    </div>
                    <div class="sidebar__sizes">
                        <div class="section-title">
                            <h4>Shop by size</h4>
                        </div>
                        <div class="size__list">
                            @foreach ($sizes as $size)
                                <label for="size-{{ $size->id }}">
                                    {{ $size->size }}
                                    <input type="checkbox" id="size-{{ $size->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    <div class="sidebar__color">
                        <div class="section-title">
                            <h4>Shop by color</h4>
                        </div>
                        <div class="size__list color__list">
                            @foreach ($colors as $color)
                                <label for="color-{{ $color->id }}">
                                    {{ $color->color }}
                                    <input type="checkbox" id="color-{{ $color->id }}">
                                    <span class="checkmark"></span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-9">
                <div class="row" id="product-list">
                    @php
                        $productCount = 0;
                    @endphp
                    @foreach ($products as $product)
                        @foreach ($product->variants as $variant)
                            <div class="col-lg-4 col-md-6 product-item  @if ($productCount >= 12) d-none @endif">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg"
                                        data-setbg="{{ asset('uploads/' . $product->images->first()->url) }}">
                                        <ul class="product__hover">
                                            <li><a href="{{ asset('uploads/' . $product->images->first()->url) }}"
                                                    class="image-popup"><span class="arrow_expand"></span></a></li>
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
                                        <div class="product__price">$ {{ $variant->price }}</div>
                                    </div>
                                </div>
                            </div>
                            @php
                                $productCount++;
                            @endphp
                        @endforeach
                    @endforeach
                </div>
                <!-- Nút Xem thêm -->
                <div class="col-lg-12 text-center">
                    <button id="load-more-btn"
                        class="btn btn-primary @if ($productCount <= 12) d-none @endif">Xem
                        thêm</button>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Section End -->

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

<script>
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

        $('#filter-btn').on('click', function() {
            var min = $("#minamount").val();
            var max = $("#maxamount").val();
            var url = new URL(window.location.href);
            url.searchParams.set('min_price', min);
            url.searchParams.set('max_price', max);
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
                    loadMoreBtn.style.display = 'none'; // Ẩn nút khi hết sản phẩm để hiển thị
                    break;
                }
            }
            currentCount += 12;
        });
    });
</script>