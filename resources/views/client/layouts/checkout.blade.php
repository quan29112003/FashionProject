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
                        <!-- Swiper -->
                        <div class="swiper-row">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    @foreach ($vouchers as $voucher)
                                        <div class="swiper-slide">
                                            <div class="d-flex justify-content-center mt-5">
                                                <div class="voucher-container ">
                                                    <div class="voucher-header">
                                                        <p class="fs-3 text-center">Voucher</p>
                                                        @if ($voucher->discount_type == 'discount')
                                                            <p class="fs-3 text-center">
                                                                {{ number_format($voucher->discount_value) }}K
                                                            </p>
                                                        @else
                                                            <p class="fs-3 text-center">
                                                                {{ $voucher->discount_value }}%
                                                            </p>
                                                        @endif
                                                    </div>
                                                    <div class="voucher-content">
                                                        <p>Giảm {{ number_format($voucher->discount_value) }}k cho đơn
                                                            từ
                                                            {{ number_format($voucher->min_purchase_amount) }}k</p>
                                                        <p>HSD: {{ $voucher->expiry_date }}</p>
                                                    </div>
                                                    <div class="voucher-footer ps-2">
                                                        <a href="#" class="btn-save" data-min-purchase="{{ $voucher->min_purchase_amount }}" data-discount="{{ $voucher->discount_value }}" data-discount-type="{{ $voucher->discount_type }}">Sử dụng</a>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
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
                                <li id="voucher-value">voucher <span id="voucher-discount">₫</span></li>
                                <li>Total <span id="total-value">{{ number_format($total) }}₫</span></li>
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

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style=" width: 180%; left: -200px;">
            <div class="modal-header">
                <h5 class="modal-title" id="successModalLabel">Order Successful</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">



                <div class="container-fluid">

                    <div class="container">
                        <!-- Title -->
                        <div class="d-flex justify-content-between align-items-center py-3">
                            <h2 class="h5 mb-0"><a href="#" class="text-muted"></a> Order #16123222</h2>
                        </div>

                        <!-- Main content -->
                        <div class="row">
                            <div class="col-lg-8">
                                <!-- Details -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3 d-flex justify-content-between">
                                            <div>
                                                <span class="me-3">22-11-2021</span>
                                                <span class="me-3">#16123222</span>
                                                <span class="me-3">Visa -1234</span>
                                                <span class="badge rounded-pill bg-info">SHIPPING</span>
                                            </div>
                                            <div class="d-flex">
                                                <button
                                                    class="btn btn-link p-0 me-3 d-none d-lg-block btn-icon-text"><i
                                                        class="bi bi-download"></i> <span
                                                        class="text">Invoice</span></button>
                                                <div class="dropdown">
                                                    <button class="btn btn-link p-0 text-muted" type="button"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bi bi-three-dots-vertical"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-pencil"></i> Edit</a></li>
                                                        <li><a class="dropdown-item" href="#"><i
                                                                    class="bi bi-printer"></i> Print</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="https://www.bootdey.com/image/280x280/87CEFA/000000"
                                                                    alt="" width="35" class="img-fluid">
                                                            </div>
                                                            <div class="flex-lg-grow-1 ms-3">
                                                                <h6 class="small mb-0"><a href="#"
                                                                        class="text-reset">Wireless Headphones with
                                                                        Noise Cancellation Tru Bass Bluetooth HiFi</a>
                                                                </h6>
                                                                <span class="small">Color: Black</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>1</td>
                                                    <td class="text-end">$79.99</td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex mb-2">
                                                            <div class="flex-shrink-0">
                                                                <img src="https://www.bootdey.com/image/280x280/FF69B4/000000"
                                                                    alt="" width="35" class="img-fluid">
                                                            </div>
                                                            <div class="flex-lg-grow-1 ms-3">
                                                                <h6 class="small mb-0"><a href="#"
                                                                        class="text-reset">Smartwatch IP68 Waterproof
                                                                        GPS and Bluetooth Support</a></h6>
                                                                <span class="small">Color: White</span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>1</td>
                                                    <td class="text-end">$79.99</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="2">Subtotal</td>
                                                    <td class="text-end">$159,98</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Shipping</td>
                                                    <td class="text-end">$20.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">Discount (Code: NEWYEAR)</td>
                                                    <td class="text-danger text-end">-$10.00</td>
                                                </tr>
                                                <tr class="fw-bold">
                                                    <td colspan="2">TOTAL</td>
                                                    <td class="text-end">$169,98</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <!-- Payment -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <h3 class="h6">Payment Method</h3>
                                                <p>Visa -1234 <br>
                                                    Total: $169,98 <span
                                                        class="badge bg-success rounded-pill">PAID</span></p>
                                            </div>
                                            <div class="col-lg-6">
                                                <h3 class="h6">Billing address</h3>
                                                <address>
                                                    <strong>John Doe</strong><br>
                                                    1355 Market St, Suite 900<br>
                                                    San Francisco, CA 94103<br>
                                                    <abbr title="Phone">P:</abbr> (123) 456-7890
                                                </address>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <!-- Customer Notes -->
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <h3 class="h6">Customer Notes</h3>
                                        <p>Sed enim, faucibus litora velit vestibulum habitasse. Cras lobortis cum sem
                                            aliquet mauris rutrum. Sollicitudin. Morbi, sem tellus vestibulum porttitor.
                                        </p>
                                    </div>
                                </div>
                                <div class="card mb-4">
                                    <!-- Shipping information -->
                                    <div class="card-body">
                                        <h3 class="h6">Shipping Information</h3>
                                        <strong>FedEx</strong>
                                        <span><a href="#" class="text-decoration-underline"
                                                target="_blank">FF1234567890</a> <i
                                                class="bi bi-box-arrow-up-right"></i> </span>
                                        <hr>
                                        <h3 class="h6">Address</h3>
                                        <address>
                                            <strong>John Doe</strong><br>
                                            1355 Market St, Suite 900<br>
                                            San Francisco, CA 94103<br>
                                            <abbr title="Phone">P:</abbr> (123) 456-7890
                                        </address>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('success'))
            $('#successModal').modal('show');
        @endif
    });
</script>
