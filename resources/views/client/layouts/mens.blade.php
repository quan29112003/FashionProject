@include('client.partials.header')
<!-- Header Section End -->

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ url('/') }}"><i class="fa fa-home"></i> Shop</a>
                    <span>Mens</span>
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
                                    $<input type="text" id="minamount">
                                    $<input type="text" id="maxamount">
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
                                    <input type="checkbox" id="size-{{ $size->id }}">
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
                                    <input type="checkbox" id="color-{{ $color->id }}">
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
                        @php
                            $colors = $variantProducts[$product->id]->pluck('color')->unique();
                            $sizes =  $variantProducts[$product->id]->pluck('size')->unique();
                            $selectedColorId = $colors->first() ? $colors->first()->id : null;
                        @endphp
                        @foreach ($product->variants as $variant)
                            <div class="col-lg-4 col-md-6 product-item product__item-custome @if ($productCount >= 12) d-none @endif">
                                <div class="product__item">
                                    <div class="product__item__pic set-bg" data-setbg="{{ asset('uploads/' . $product->images->first()->url) }}">

                                        <ul class="product__hover">
                                            <li>
                                                <a href="{{ asset('uploads/' . $product->images->first()->url) }}" class="image-popup">
                                                    <span class="arrow_expand"></span>
                                                </a>
                                            </li>

                                            {{-- thêm sảm phẩm vào wishlist --}}
                                            <li>
                                                <form id="wishlist-form-{{ $product->id }}" action="{{ route('wishlist.add', $product->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('wishlist-form-{{ $product->id }}').submit();">
                                                    <span class="icon_heart_alt"></span>
                                                </a>
                                            </li>

                                            <li>
                                                <a href="#">
                                                    <span class="icon_bag_alt"></span>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>

                                    <div class="product__item__text1">

                                        <h6>
                                            <a href="{{ route('detail', $product->id) }}" class="truncate">{{ $product->name_product }}</a>
                                        </h6>
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                        <i class="fa fa-star"></i>--}}
{{--                                    </div>       <div class="rating">--}}
                                        <div class="swatch-attribute-options-{{$product->id}} text-center">
                                            @foreach($colors as $color)
                                                <div onclick="getSizeByColor(event,{{$color->id}},{{$product->id}})"
                                                     class="swatch-option color {{$color->id == $selectedColorId ? 'selected': ''}}"
                                                     data-color-id="{{$color->id}}"
                                                     id="swichcolor-{{$color->id}}-{{$product->id}}"
                                                     style="background-color: {{$color->color_code}}"></div>
                                            @endforeach
                                        </div>
                                        <div class="product__price">
                                            {{ isset($variant->price) ? number_format($variant->price) . ' ₫' : 'Price not available' }}
                                        </div>
                                    </div>

                                </div>
                                @if($product->is_hot == 1)
                                <div class="status-product">
                                    new
                                </div>
                                    @endif
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

        // Sorting filter
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
