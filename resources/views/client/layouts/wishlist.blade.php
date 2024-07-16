@extends('client.layouts.app')

@section('content')
<style>
    .cart__product__item img {
        max-width: 100px;
        height: auto;
        margin-right: 15px;
    }

    .cart__product__item__title h6 {
        margin: 0;
        padding-left: 10px;
    }
</style>

<div id="toast-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;"></div>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{ url('/')}}"><i class="fa fa-home"></i> Home</a>
                    <span>Wishlist</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Wishlist Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    @if (count($wishlists) > 0)
                        <table>
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity Available</th>
                                    <th>Sale Price</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($wishlists as $wishlist)
                                    @if ($wishlist->product && $wishlist->product->variants->isNotEmpty())
                                        @php
                                            $variant = $wishlist->product->variants->first();
                                        @endphp
                                        <tr id="wishlist-item-{{ $wishlist->id }}">
                                            <td class="cart__product__item">
                                                <img src="{{ asset('uploads/' . $wishlist->product->thumbnail) }}" alt="">
                                                <div class="cart__product__item__title">
                                                    <a href="{{ route('detail', $wishlist->productID) }}"><h6>{{ $wishlist->product->name_product }}</h6></a>
                                                </div>
                                            </td>
                                            <td class="cart__price">${{ number_format($variant->price, 2) }}</td>
                                            <td class="cart__quantity">{{ $variant->quantity }}</td>
                                            <td class="cart__total">${{ number_format($variant->price_sale, 2) }}</td>
                                            <td class="cart__close">
                                                <button onclick="deleteWishlistItem({{ $wishlist->id }})" class="btn btn-danger btn-sm">Remove</button>
                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No product in wishlist</td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                            
                            
                        </table>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="cart__btn">
                                    <a class="site-btn" href="{{ url('/') }}">Continue Shopping</a>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-info">
                            No products in the wishlist.
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
<!-- Wishlist Section End -->

<!-- Instagram Begin -->
<div class="instagram">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-1.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-2.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-3.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-4.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-5.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ashion_shop</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-md-4 col-sm-4 p-0">
                <div class="instagram__item set-bg" data-setbg="{{ asset('theme-cli/img/instagram/insta-6.jpg') }}">
                    <div class="instagram__text">
                        <i class="fa fa-instagram"></i>
                        <a href="#">@ashion_shop</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instagram End -->

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <script>
        function deleteWishlistItem(id) {
            $.ajax({
                url: '/wishlist/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.success) {
                        // Xóa hàng trong bảng
                        $('#wishlist-item-' + id).remove();
                        showToast(response.message, 'success');
                    } else {
                        showToast(response.message, 'error');
                    }
                },
                error: function(xhr) {
                    showToast('An error occurred. Please try again later.', 'error');
                }
            });
        }

        function showToast(message, type) {
            var toastContainer = $('#toast-container');
            var autoHideDelay = 5000; // 5 seconds

            var toastClass = 'bg-' + (type === 'success' ? 'success' : 'danger');
            var toast = $('<div class="toast text-white ' + toastClass +
                '" role="alert" aria-live="assertive" aria-atomic="true">' +
                '<div class="toast-header">' +
                '<strong class="me-auto">Notification</strong>' +
                '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
                '</div>' +
                '<div class="toast-body">' + message + '</div>' +
                '</div>');

            // Append toast to container and show it
            toastContainer.append(toast);
            var bootstrapToast = new bootstrap.Toast(toast[0], {
                delay: autoHideDelay
            });
            bootstrapToast.show();

            // Remove toast after it's hidden
            toast.on('hidden.bs.toast', function() {
                toast.remove();
            });
        }
    </script>