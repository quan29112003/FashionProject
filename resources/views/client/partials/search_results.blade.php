{{-- resources/views/search-results.blade.php --}}

@if(empty($products))
    <p>No products found.</p>
@else
@php
    $productCount = 0;
@endphp

<div class="row property__gallery" id="product-gallery">
<!-- Thư viện sản phẩm -->
@foreach ($products as $product)
    <!-- Lặp qua các sản phẩm -->

    {{-- @foreach ($product->variants as $variant) --}}
        <!-- Lặp qua các biến thể của mỗi sản phẩm -->
        <div
            class="col-lg-3 col-md-4 col-sm-6 mix @if ($productCount >= 8) d-none @endif">
            <!-- Item sản phẩm với lớp điều kiện để giới hạn hiển thị -->
            <div class="product__item">

                @if (!empty($product['image']))
                    <!-- Kiểm tra xem sản phẩm có hình ảnh hay không -->
                    <div class="product__item__pic set-bg"
                        style="background-image: url('{{$product['image']}}')">

                        {{-- <a href="{{ route('detail', $product['id']) }}">
                            <img src="{{ $product['image'] }}"
                                alt="img product">
                        </a> --}}

                        <!-- Hình ảnh sản phẩm -->
                        <ul class="product__hover">
                            <!-- Các hành động khi hover -->

                            <li>
                                <a href="{{ $product['image'] }}"
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
                        <a href="{{ route('detail', $product['id']) }}">{{ $product['name_product'] }}</a>
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

                    @if ($product['price'])
                        <div class="product__price">${{$product['price']}}</div>
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
    {{-- @endforeach --}}
@endforeach
</div>
@endif
