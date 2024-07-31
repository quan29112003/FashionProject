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
                        <!-- Các trường thông tin người mua -->
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>First Name <span>*</span></p>
                                <input type="text" name="first_name" value="{{ old('first_name') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Last Name <span>*</span></p>
                                <input type="text" name="last_name" value="{{ old('last_name') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Country <span>*</span></p>
                                <input type="text" name="country" value="{{ old('country') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Address <span>*</span></p>
                                <input type="text" name="address" placeholder="Street Address"
                                    value="{{ old('address') }}">
                                <input type="text" name="address2"
                                    placeholder="Apartment. suite, unit etc (optional)" value="{{ old('address2') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Town/City <span>*</span></p>
                                <input type="text" name="city" value="{{ old('city') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Country/State <span>*</span></p>
                                <input type="text" name="state" value="{{ old('state') }}">
                            </div>
                            <div class="checkout__form__input">
                                <p>Postcode/Zip <span>*</span></p>
                                <input type="text" name="postcode" value="{{ old('postcode') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Phone <span>*</span></p>
                                <input type="text" name="phone" value="{{ old('phone') }}">
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="text" name="email" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Note about your order, e.g, special note for delivery</p>
                                <input type="text" name="note"
                                    placeholder="Note about your order, e.g, special note for delivery"
                                    value="{{ old('note') }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Voucher Code</p>
                                <input type="text" id="voucher-code-input" name="voucher_code"
                                    placeholder="Enter your voucher code">
                                <button id="apply-voucher-button" class="site-btn">Apply Voucher</button>
                                <span id="voucher-message"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>Your order</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li><span class="top__text">Product</span> <span class="top__text__right">Total</span></li>
                                @foreach (session('cart', []) as $item)
                                    <li>{{ $item['name'] }} <span>{{ $item['price'] * $item['quantity'] }}₫</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Subtotal <span id="subtotal">{{ $total }}₫</span></li>
                                <li id="discount-row" style="display: {{ $discount > 0 ? 'block' : 'none' }};">
                                    Discount <span id="discount">-{{ $discount }}₫</span>
                                </li>
                                <li>Total <span id="total">{{ $finalTotal }}₫</span></li>
                            </ul>
                        </div>
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

<!-- Add CSRF Token for AJAX Requests -->
<meta name="csrf-token" content="{{ csrf_token() }}">

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
</style>
<!-- JavaScript để xử lý AJAX -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('apply-voucher-button').addEventListener('click', function(e) {
            e.preventDefault(); // Ngăn không cho form bị submit
            
            let voucherCode = document.getElementById('voucher-code-input').value;
            let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            
            fetch('{{ route("apply.voucher") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': csrfToken
                },
                body: JSON.stringify({ voucher_code: voucherCode })
            })
            .then(response => response.json())
            .then(data => {
                // Xử lý kết quả từ server
                let voucherMessage = document.getElementById('voucher-message');
                if (data.success) {
                    // Nếu mã voucher hợp lệ
                    voucherMessage.innerText = "Mã voucher đã được áp dụng thành công.";
                    voucherMessage.style.color = 'green';
                    
                    // Cập nhật tổng số tiền đơn hàng
                    document.getElementById('subtotal').innerText = data.subtotal + '₫';
                    document.getElementById('discount').innerText = '-' + data.discount + '₫';
                    document.getElementById('total').innerText = data.new_total + '₫';
                    
                    // Hiển thị hàng giảm giá nếu chưa hiển thị
                    document.getElementById('discount-row').style.display = 'block';
                } else {
                    // Nếu mã voucher không hợp lệ
                    voucherMessage.innerText = data.message;
                    voucherMessage.style.color = 'red';
                    
                    // Ẩn hàng giảm giá nếu mã không hợp lệ
                    document.getElementById('discount-row').style.display = 'none';
                    document.getElementById('discount').innerText = '0₫';
                    document.getElementById('total').innerText = data.subtotal + '₫';
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    });
    </script>