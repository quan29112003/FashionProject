@include('client.partials.header')

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="/"><i class="fa fa-home"></i> Home</a>
                    <span>{{ $product->name_product }}</span> <!-- Tên sản phẩm -->
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
                        @foreach($images as $image)
                            <a class="pt" href="#product-{{ $loop->iteration }}">
                                <img src="{{ asset('uploads/' . $image->first()->url) }}">
                            </a>
                        @endforeach
                    </div>
                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            @foreach($images as $image)
                                <img data-hash="product-{{ $loop->iteration }}" class="product__big__img" src="{{ asset('uploads/' . $image->first()->url) }}" alt="{{ $product->name_product }}">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3>{{ $product->name_product }} <span>Brand: {{ $product->brand }}</span></h3>
                    <!-- Đánh giá sản phẩm -->
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 reviews )</span>
                    </div>
                    <div class="product__details__price">${{ $price }} <span>${{ $price_sale }}</span></div>
                    <p>{{ $product->description }}</p>
                    <!-- Widget thêm vào giỏ hàng -->
                    <div class="product__details__button">
                        <div class="quantity">
                            <span>Quantity:</span>
                            <div class="pro-qty">
                                <input type="text" value="1">
                            </div>
                        </div>
                        <a href="#" class="cart-btn"><span class="icon_bag_alt"></span> Add to cart</a>
                        <ul>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                        </ul>
                    </div>
                    <!-- Widget chi tiết sản phẩm -->
                    <div class="product__details__widget">
                        <ul>
                            <li>
                                <span>Availability:</span>
                                <div class="stock__checkbox">
                                    <label for="stockin">
                                        @if($product->is_in_stock)
                                            In Stock
                                        @else
                                            Out of Stock
                                        @endif
                                        <input type="checkbox" id="stockin" {{ $product->is_in_stock ? 'checked' : '' }}>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </li>
                            <li>
                                <span>Category:</span> {{ $category }} <!-- Hiển thị tên danh mục -->
                            </li>
                            <!-- Các lựa chọn khác (màu sắc, kích cỡ, khuyến mãi, ...) -->
                            <li>
                                <span>Color:</span>
                                <select name="color" id="color">
                                    @foreach($variants->unique('color') as $variant)
                                        <option value="{{ $variant->color }}">{{ $variant->color }}</option>
                                    @endforeach
                                </select>
                            </li>
                            <li>
                                <span>Size:</span>
                                <select name="size" id="size">
                                    @foreach($variants->unique('size') as $variant)
                                        <option value="{{ $variant->size }}">{{ $variant->size }}</option>
                                    @endforeach
                                </select>
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
                        <li class="nav-item">
                            {{-- <a class="nav-link" data-toggle="tab" href="#tabs-3" role="tab">Reviews ({{ $product->reviews->count() }})</a> --}}
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
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            {{-- <h6>Reviews ({{ $product->reviews->count() }})</h6>
                            @foreach($product->reviews as $review)
                                <div class="review">
                                    <div class="review__author">
                                        <h6>{{ $review->user->name }}</h6>
                                        <span>{{ $review->created_at->format('M d, Y') }}</span>
                                    </div>
                                    <p>{{ $review->content }}</p>
                                </div>
                            @endforeach --}}
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
            @foreach($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="{{ asset('uploads/' . $relatedProduct->images->first()->url) }}">
                            <ul class="product__hover">
                                <li><a href="{{ asset('uploads/' . $relatedProduct->images->first()->url) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                                <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="{{ route('detail', $relatedProduct->id) }}">{{ $relatedProduct->name_product }}</a></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price">
                                @if($relatedProduct->price_sale)
                                    <span>${{ $relatedProduct->price }}</span> ${{ $relatedProduct->price_sale }}
                                @else
                                    ${{ $relatedProduct->price }}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Product Details Section End -->

@include('client.partials.footer')
