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
                                        <tr>
                                            <td class="cart__product__item">
                                                <img src="{{ asset('uploads/' . $wishlist->product->thumbnail) }}" alt="">
                                                <div class="cart__product__item__title">
                                                    <a href="{{ route('detail', $wishlist->productID)}}"><h6>{{ $wishlist->product->name_product }}</h6></a>
                                                </div>
                                            </td>
                                            <td class="cart__price">${{ number_format($variant->price, 2) }}</td>
                                            <td class="cart__quantity">{{ $variant->quantity }}</td>
                                            <td class="cart__total">${{ number_format($variant->price_sale, 2) }}</td>
                                            <td class="cart__close">
                                                <form action="{{ route('wishlist.remove', $wishlist->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">Remove</button>
                                                </form>
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
