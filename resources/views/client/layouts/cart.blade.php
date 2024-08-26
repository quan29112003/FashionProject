@include('client.partials.header')
<style>
    .cart__product__item img {
        max-width: 100px;
        height: auto;
    }

    .cart__product__item img {
        width: 100px;
        margin-right: 15px;
    }

    .cart__product__item__title h6 {
        margin: 0;
        padding-left: 10px;
    }
</style>
@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    @if (count(session('cart', [])) > 0)
                        <table class="table" style="text-align: center; align-item: center">
                            <thead>
                                <tr>
                                    <th>Sản phẩm</th>
                                    <th>Size</th>
                                    <th>Màu</th>
                                    <th>Giá</th>
                                    <th>Số lượng</th>
                                    <th>Tổng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @foreach (session('cart', []) as $key => $item)
                                    <tr data-product-id="{{ $item['product_id'] }}"
                                        data-variant-id="{{ $item['variant_id'] }}">
                                        <td class="cart__product__item">
                                            <img src="{{ asset('uploads/' . $item['image']) }}" alt="">
                                            <div class="cart__product__item__title">
                                                <h6>{{ $item['name'] }}</h6>
                                            </div>
                                        </td>
                                        <td>{{ $item['size'] }}</td>
                                        <td><span class="swatch-option color"
                                                style="background-color: {{ $item['color_code'] }}"></span></td>
                                        <td class="cart__price">
                                            {{ number_format($item['price'], 0, ',', '.') }}₫
                                        </td>
                                        <td class="cart__quantity">
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend">
                                                    <button style="border: none" type="button" class="btn btn-number"
                                                        data-type="minus"
                                                        @if (!array_key_exists('in_stock', $item) || !$item['in_stock'] || $item['quantity'] <= 1) disabled @endif>-</button>
                                                </div>
                                                <input disabled
                                                    style="border: none; background-color: #fff; text-align: center;"
                                                    type="text" class="form-control input-number update-cart"
                                                    name="quantity" data-product-id="{{ $item['product_id'] }}"
                                                    data-variant-id="{{ $item['variant_id'] }}"
                                                    value="{{ $item['quantity'] }}" min="1"
                                                    data-max-quantity="{{ $item['max_quantity'] }}">
                                                <div class="input-group-append">
                                                    <button style="border: none" type="button" class="btn btn-number"
                                                        data-type="plus"
                                                        @if (!array_key_exists('in_stock', $item) || !$item['in_stock'] || $item['quantity'] >= $item['max_quantity']) disabled @endif>+</button>
                                                </div>
                                            </div>
                                            @if (!$item['in_stock'])
                                                <div class="text-danger mt-1">Sản phẩm đã hết hàng</div>
                                            @endif
                                        </td>



                                        <td class="cart__total">
                                            {{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}
                                            ₫
                                        </td>
                                        <td class="cart__close">
                                            <form action="{{ route('cart.remove') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="product_id"
                                                    value="{{ $item['product_id'] }}">
                                                <input type="hidden" name="variant_id"
                                                    value="{{ $item['variant_id'] }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @php $total += $item['price'] * $item['quantity']; @endphp
                                @endforeach
                            </tbody>
                        </table>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cart__total__procced">
                                    <h6>TỔNG GIỎ HÀNG</h6>
                                    <ul>
                                        <li>Tạm tính <span
                                                id="subtotal">{{ number_format($total, 0, ',', '.') }}₫</span>
                                        </li>
                                        <li>Tổng cộng <span
                                                id="total">{{ number_format($total, 0, ',', '.') }}₫</span>
                                        </li>
                                    </ul>
                                    <a href="{{ url('checkout') }}" class="primary-btn">Tiến hành thanh toán</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            Không có sản phẩm trong giỏ hàng.
                        </div>
                        <div class="cart__btn">
                            <a class="site-btn" href="{{ url('/') }}">Continue Shopping</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->

<!-- Script cho AJAX -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-1.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-2.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-3.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-4.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-5.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-6.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->

<script>
    $(document).ready(function() {
        console.log('Document is ready');

        function updateQuantity(element) {
            var productId = element.data('product-id');
            var variantId = element.data('variant-id');
            var quantity = element.val();

            console.log({
                productId: productId,
                variantId: variantId,
                quantity: quantity
            });

            $.ajax({
                url: '{{ route('cart.updateQuantity') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    product_id: productId,
                    variant_id: variantId,
                    quantity: quantity
                },
                success: function(response) {
                    console.log('AJAX success');
                    console.log(response);
                    if (response.success) {
                        var itemTotalPrice = response.item_total;
                        var cartTotalPrice = response.cart_total;

                        $('tr[data-product-id="' + productId + '"][data-variant-id="' + variantId +
                            '"] .cart__total').text(itemTotalPrice.toLocaleString('vi-VN') +
                            '₫');
                        $('#subtotal').text(cartTotalPrice.toLocaleString('vi-VN') + '₫');
                        $('#total').text(cartTotalPrice.toLocaleString('vi-VN') + '₫');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    console.error('Status:', status);
                    console.error('Response:', xhr.responseText);
                }
            });
        }

        $('.quantity').on('click', '.btn-number', function() {
            var type = $(this).attr('data-type');
            var input = $(this).closest('.quantity').find('.update-cart');
            var currentVal = parseInt(input.val());
            var maxQuantity = parseInt(input.data('max-quantity'));

            if (!isNaN(currentVal)) {
                if (type == 'minus') {
                    if (currentVal > 1) {
                        input.val(currentVal - 1).trigger('change');
                    }
                } else if (type == 'plus') {
                    if (currentVal < maxQuantity) {
                        input.val(currentVal + 1).trigger('change');
                    }
                }
            } else {
                input.val(1);
            }
        });


        $('.update-cart').change(function() {
            updateQuantity($(this));
        });
    });
</script>
<!-- Footer Section Begin -->
@include('client.partials.footer')
<!-- Footer Section End -->
