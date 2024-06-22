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
                        <form action="{{ route('cart.update') }}" method="POST">
                            @csrf
                            <table>
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $total = 0; @endphp
                                    @foreach (session('cart', []) as $key => $item)
                                        <tr>
                                            <td class="cart__product__item">
                                                <img src="{{ asset('uploads/' . $item['image']) }}" alt="">
                                                <div class="cart__product__item__title">
                                                    <h6>{{ $item['name'] }}</h6>
                                                </div>
                                            </td>
                                            <td class="cart__price">${{ $item['price'] }}</td>
                                            <td class="cart__quantity">
                                                <div class="pro-qty">
                                                    <input type="text" name="cart[{{ $key }}][quantity]"
                                                        value="{{ $item['quantity'] }}">
                                                    <input type="hidden" name="cart[{{ $key }}][product_id]"
                                                        value="{{ $item['product_id'] }}">
                                                    <input type="hidden" name="cart[{{ $key }}][variant_id]"
                                                        value="{{ $item['variant_id'] }}">
                                                </div>
                                            </td>
                                            <td class="cart__total">
                                                ${{ number_format($item['price'] * $item['quantity'], 2) }}</td>
                                            {{-- <td class="cart__close">
                                                <form action="{{ route('cart.remove') }}" method="POST"
                                                    style="display:inline;">
                                                    @csrf
                                                    <input type="hidden" name="product_id"
                                                        value="{{ $item['product_id'] }}">
                                                    <input type="hidden" name="variant_id"
                                                        value="{{ $item['variant_id'] }}">
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
                                            </td> --}}

                                        </tr>

                                        @php $total += $item['price'] * $item['quantity']; @endphp
                                    @endforeach
                                </tbody>
                            </table>
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="cart__btn">
                                        <a class="site-btn" href="{{ url('/') }}">Continue Shopping</a>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="cart__btn update__btn">
                                        <button class="site-btn" type="submit">Update cart</button>
                                        <form action="{{ route('cart.clear') }}" method="POST"
                                            style="margin-top: 20px;">
                                            @csrf
                                            <button type="submit" class="site-btn">Clear Cart</button>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </form>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="discount__content">
                                    <h6>Discount codes</h6>
                                    <form action="#">
                                        <input type="text" placeholder="Enter your coupon code">
                                        <button type="submit" class="site-btn">Apply</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 offset-lg-2">
                                <div class="cart__total__procced">
                                    <h6>Cart total</h6>
                                    <ul>
                                        <li>Subtotal <span>${{ $total }}</span></li>
                                        <li>Total <span>${{ $total }}</span></li>
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
