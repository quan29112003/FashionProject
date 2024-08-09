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
    <div class="offcanvas offcanvas-end" style="min-width: 35%" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">sản phẩm yêu thích</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div id="toast-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;"></div>

            <!-- Breadcrumb Begin -->
            <div class="breadcrumb-option">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="breadcrumb__links">
                                <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
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
                                @if ($wishlists && count($wishlists) > 0)
                                    @foreach ($wishlists as $wishlist)
                                        @if ($wishlist->product && $wishlist->product->variants->isNotEmpty())
                                            @php
                                                $variant = $wishlist->product->variants->first();
                                            @endphp
                                            <div id="wishlist-item-{{ $wishlist->id }}"
                                                class="d-flex align-items-center mb-3">
                                                <div class="me-3">
                                                    <a
                                                        href="{{ route('detail', ['id' => $wishlist->product->id, 'name' => str_replace(' ', '-', strtolower($wishlist->product->name_product))]) }}">
                                                        <img src="{{ asset('uploads/' . $wishlist->product->thumbnail) }}"
                                                            alt="" class="img-thumbnail" style="max-width: 100px;">
                                                    </a>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="{{ route('detail', ['id' => $wishlist->product->id, 'name' => str_replace(' ', '-', strtolower($wishlist->product->name_product))]) }}"
                                                        class="text-decoration-none">
                                                        <h6 class="mb-2">{{ $wishlist->product->name_product }}</h6>
                                                    </a>
                                                    <p class="mb-1">số lượng: {{ $variant->quantity }}</p>
                                                    <p class="mb-1 text-danger fw-bold">chỉ còn:
                                                        {{ number_format($variant->price_sale, 0, ',', '.') }}đ</p>
                                                    <p class="mb-1 text-decoration-line-through">giá gốc:
                                                        {{ number_format($variant->price, 0, ',', '.') }}đ</p>
                                                </div>
                                                <div>
                                                    <button onclick="deleteWishlistItem({{ $wishlist->id }})"
                                                        class="btn btn-danger btn-sm">Remove</button>
                                                </div>
                                            </div>
                                        @else
                                            <div>
                                                <p colspan="5" class="text-center">No product in wishlist</p>
                                            </div>
                                        @endif
                                    @endforeach
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
        </div>
    </div>
    <div id="toast-container" class="position-fixed bottom-0 end-0 p-3" style="z-index: 11;"></div>

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="{{ url('/') }}"><i class="fa fa-home"></i> Home</a>
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
                                        <th>Sản Phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>giảm giá</th>
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
                                                    <a
                                                        href="{{ route('detail', ['id' => $wishlist->product->id, 'name' => str_replace(' ', '-', strtolower($wishlist->product->name_product))]) }}">
                                                        <img src="{{ asset('uploads/' . $wishlist->product->thumbnail) }}"
                                                            alt="">
                                                        <div class="cart__product__item__title">
                                                            <h6>{{ $wishlist->product->name_product }}</h6>

                                                        </div>
                                                    </a>
                                                </td>
                                                <td class="cart__price">{{ number_format($variant->price, 0, ',', '.') }}đ
                                                </td>
                                                <td class="cart__quantity">{{ $variant->quantity }}</td>
                                                <td class="cart__total">
                                                    {{ number_format($variant->price_sale, 0, ',', '.') }}đ
                                                </td>
                                                <td class="cart__close">
                                                    <button onclick="deleteWishlistItem({{ $wishlist->id }})"
                                                        class="btn btn-danger btn-sm">Remove</button>
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
