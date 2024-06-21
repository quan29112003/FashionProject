<div class="product__item">

    @if ($product->images->isNotEmpty())
        <!-- Kiểm tra xem sản phẩm có hình ảnh hay không -->
        <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $product->images->first()->url) }}">

            <a href="{{ route('detail', $product->id) }}">
                <img src="{{ asset('uploads/' . $product->images->first()->url) }}" alt="img product">
            </a>

            <!-- Hình ảnh sản phẩm -->
            <ul class="product__hover">
                <!-- Các hành động khi hover -->

                <li>
                    <a href="{{ asset('storage/' . $product->images->first()->url) }}" class="image-popup">
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
            <a href="{{ route('detail', $product->id) }}">{{ $product->name_product }}</a>
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

        <div class="product__price">${{ $variant->price }}</div>
        <!-- Giá sản phẩm -->
    </div>
</div>
