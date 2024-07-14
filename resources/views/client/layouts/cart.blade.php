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
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
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
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Color</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
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
                                        <td><span class="swatch-option color" style="background-color: {{$item['color_code']}}"></span></td>
                                        <td class="cart__price">{{ $item['price'] }}₫</td>
                                        <td class="cart__quantity">
                                            <div class="input-group quantity">
                                                <div class="input-group-prepend">
                                                    <button style="border: 1px solid #ccc" type="button" class="btn btn-outline-secondary btn-number"
                                                        data-type="minus">-</button>
                                                </div>
                                                <input type="number" class="form-control input-number update-cart"
                                                    name="quantity" data-product-id="{{ $item['product_id'] }}"
                                                    data-variant-id="{{ $item['variant_id'] }}"
                                                    value="{{ $item['quantity'] }}" min="1">
                                                <div class="input-group-append">
                                                    <button style="border: 1px solid #ccc" type="button" class="btn btn-outline-secondary btn-number"
                                                        data-type="plus">+</button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="cart__total">{{ $item['price'] * $item['quantity'] }}₫</td>
                                        <td class="cart__close">
                                            <form action="{{ route('cart.remove') }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                <input type="hidden" name="product_id"
                                                    value="{{ $item['product_id'] }}">
                                                <input type="hidden" name="variant_id"
                                                    value="{{ $item['variant_id'] }}">
                                                <button type="submit" class="btn btn-danger btn-sm">Remove</button>
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
                                    <h6>Cart total</h6>
                                    <ul>
                                        <li>Subtotal <span id="subtotal">{{ $total }}₫</span></li>
                                        <li>Total <span id="total">{{ $total }}₫</span></li>
                                    </ul>
                                    <a href="{{ route('checkout') }}" class="primary-btn">Proceed to checkout</a>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        console.log('Document is ready');

        // Function to handle the quantity update
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
                            '"] .cart__total').text(itemTotalPrice + '₫');
                        $('#subtotal').text(cartTotalPrice + '₫');
                        $('#total').text(cartTotalPrice + '₫');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error:', error);
                    console.error('Status:', status);
                    console.error('Response:', xhr.responseText);
                }
            });
        }

        // Handle click on plus and minus buttons
        $('.quantity').on('click', '.btn-number', function() {
            var type = $(this).attr('data-type');
            var input = $(this).closest('.quantity').find('.update-cart');
            var currentVal = parseInt(input.val());
            if (!isNaN(currentVal)) {
                if (type == 'minus') {
                    if (currentVal > 1) {
                        input.val(currentVal - 1).trigger('change');
                    }
                } else if (type == 'plus') {
                    input.val(currentVal + 1).trigger('change');
                }
            } else {
                input.val(1);
            }
        });

        // Handle change event on quantity input
        $('.update-cart').change(function() {
            updateQuantity($(this));
        });
    });
</script>



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

<!-- Footer Section Begin -->
@include('client.partials.footer')
<!-- Footer Section End -->
