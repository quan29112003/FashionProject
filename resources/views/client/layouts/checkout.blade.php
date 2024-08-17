@include('client.partials.header')
<!-- Header Section End -->

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    {{-- <a href="{{ route('/') }}"><i class="fa fa-home"></i> Home</a> --}}
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt"></span> <a href="#">Have a coupon?</a> Click
                    here to enter your code.</h6>
            </div>
        </div>
        <form action="{{ route('checkout.process') }}" method="POST" class="checkout__form">
            @csrf
            <div class="row">
                <div class="col-lg-8">
                    <h5>Billing detail</h5>
                    <div class="row">
                        <!-- Trường thông tin người mua -->
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Full Name <span>*</span></p>
                                <input type="text" name="name" value="{{ old('name') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <input type="text" name="address" placeholder="Street Address"
                                    value="{{ old('address') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>State <span>*</span></p>
                                <input type="text" name="state" value="{{ old('state') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" name="postcode" value="{{ old('postcode') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Phone <span>*</span></p>
                                <input type="text" name="phone" value="{{ old('phone') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="text" name="email" value="{{ old('email') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Note about your order, e.g, special note for delivery</p>
                                <input type="text" name="note"
                                    placeholder="Note about your order, e.g, special note for delivery"
                                    value="{{ old('note') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Voucher Code</p>
                                <input type="text" name="voucher_id" value="{{ old('voucher_id') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li><span class="top__text">Product</span> <span class="top__text__right">Total</span>
                                </li>
                                @foreach (session('cart', []) as $item)
                                    <li>{{ $item['name'] }}
                                        <span>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}₫</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Total <span>{{ number_format($total, 0, ',', '.') }}₫</span></li>
                            </ul>
                        </div>
                        <input type="hidden" name="total_amount" value="{{ $total }}">
                        <div class="checkout__form__input1">
                            <p>Payment Method <span>*</span></p>
                            <label>
                                <input type="radio" name="payment_method" value="cod" checked> Cash on Delivery
                            </label>
                            <label>
                                <input type="radio" name="payment_method" value="vnpay"> VNPAY
                            </label>
                        </div>


                        <button type="submit" class="site-btn">Place order</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->


<script></script>


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

<style>
    .checkout__form__input1 {
        display: flex;
        align-items: center;
    }

    .checkout__form__input1 p {
        margin-right: 10px;
        /* Adjust spacing as needed */
    }

    .checkout__form__input1 label {
        margin-right: 20px;
        /* Adjust spacing between radio buttons as needed */
        display: flex;
        align-items: center;

    }

    .card {
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: 1rem;
    }

    .text-reset {
        --bs-text-opacity: 1;
        color: inherit !important;
    }

    .modal fade {}
</style>





