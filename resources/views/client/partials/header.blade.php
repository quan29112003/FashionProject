<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FreshFusion</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/style.css') }}" type="text/css">
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <div class="offcanvas__logo" style="width: 30%">
            <a href="{{ url('/') }}"><img src="{{ asset('theme-cli/img/1.png') }}" alt=""></a>
        </div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li>
                <a href="#">
                    <span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a>
            </li>
            <li>
                <a href="#">
                    <span class="icon_bag_alt"></span>
                </a>
            </li>
        </ul>

        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <ul style="list-style-type:none;float: left;">
                @auth

                    <li class="nav-item">
                        <a href="{{ route('order.history') }}" class="nav-link text-dark fs-5">
                            <span>Orders</span>
                        </a>
                    </li>

                    {{-- edit profile --}}
                    <li class="nav-item">
                        <a href="{{ route('profile.edit') }}" class="nav-link text-dark fs-5">
                            <span>Edit Profile</span>
                        </a>
                    </li>
                    {{-- logout --}}
                    <li class="nav-item">
                        <a href="#" class="nav-link text-dark fs-6"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                @else
                    {{-- login --}}

                    <li class="nav-item">
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">

        <div class="p-2 header__desktop ">

            <div class="row align-items-center">
                {{-- tìm kiếm --}}
                <div class="col-12 my-3">
                    <div class="col d-flex justify-content-center">
                        <!-- Form tìm kiếm -->
                        <form id="searchForm" action="{{ route('product.search') }}" method="GET"
                            class="search-form">
                            <!-- Input tìm kiếm -->
                            <input class="search-input" type="search" name="keyword" id="searchInput"
                                placeholder="Tìm kiếm" aria-label="Search">
                            <!-- Gạch chân dưới -->
                            <div class="underline"></div>
                            <!-- Nút tìm kiếm -->
                            <button class="search-btn" type="submit">
                                <!-- Icon tìm kiếm -->
                                <i class="fa fa-search"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row align-items-center position-relative">
                <div class="col-xl-3 d-flex justify-content-between">
                    {{-- logo --}}
                    <div style="width: 30%">
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('theme-cli/img/1.png') }}" alt="Logo">
                        </a>
                    </div>
                    {{-- categorygender --}}
                    <nav class="d-flex align-items-center">
                        <ul class="nav ">
                            @foreach ($CategoryGenders as $categoryGender)
                                <li class="nav-item">
                                    <a class="nav-link fs-6 text-dark fw-bold custom-hover" href="{{ route('shop.index', ['categoryGender' => $categoryGender->id]) }}">
                                        {{ $categoryGender->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                {{-- main menu --}}
                <div class="col-xl-6">
                    <nav>
                        <ul class="nav justify-content-center">

                            @foreach ($menus as $menu)
                                <li
                                    class="nav-item {{ strcasecmp($menu->menu_item, 'Sản phẩm') === 0 ? 'hover_submenu' : '' }}">
                                    <a href="{{ url($menu->url) }}"
                                        class="{{ Request::is($menu->url) ? 'active' : '' }} nav-link fs-6 text-dark custom-hover">
                                        {{ $menu->menu_item }}
                                    </a>
                                    <div class="submenu container-fluid">
                                        @if (strcasecmp($menu->menu_item, 'Sản Phẩm') === 0)
                                            <div class="d-flex justify-content-center container py-3">
                                                <ul class="nav">
                                                    @foreach ($categories as $category)
                                                        <li class="nav-item px-5 border-start">
                                                            <a href="{{ route('shop.index', ['category' => $category->id]) }}" class="fs-6 text-dark">
                                                                <p class="fw-bold">{{ $category->name }}</p>
                                                            </a>
                                                            <ul class="nav flex-column">
                                                                @foreach ($category->catalogues as $catalogue)
                                                                    <li class="nav-item py-2">
                                                                        <a href="{{ route('shop.index', ['catalogue' => $catalogue->id]) }}"
                                                                            class="fs-6 text-dark">{{ $catalogue->name }}</a>
                                                                    </li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="d-flex justify-content-center px-4 border-start">
                                                    <div class=" mx-2">
                                                        <img src="{{ asset('uploads/bannersubmenu.jpg') }}"
                                                            class="rounded mx-auto d-block" alt="..."
                                                            style="width: 10rem;">
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="">
                        <ul class="nav justify-content-end" style="min-width: 200px">
                            <li class="nav-item dropdown">

                                <a class="nav-link text-dark fs-5" href="{{ route('profile.edit') }}" role="button"
                                    aria-expanded="false">
                                    <i class="bi bi-person-badge"></i>
                                </a>
                                <ul class="dropdown-menu" style="min-width: 200px">
                                    @auth
                                        <li>
                                            <a href="{{ route('user.orders.history') }}" class="nav-link p-0">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <p class=" text-dark fs-6 mb-3  me-3"><i
                                                            class="bi bi-receipt-cutoff"></i>
                                                    </p>
                                                    <p class=" text-dark fs-6 mb-3 ">đơn hàng</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('profile.edit') }}" class="nav-link p-0">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <p class=" text-dark fs-6 mb-3 me-3"><i
                                                            class="bi bi-person-lines-fill"></i></p>
                                                    <p class=" text-dark fs-6 mb-3 ">thông tin</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-0" type="button" data-bs-toggle="offcanvas"
                                                data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
                                                href="#">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <p class=" text-dark fs-6 mb-3  me-3"><span
                                                            class="icon_heart_alt"></span></p>
                                                    <p class=" text-dark fs-6 mb-3 ">yêu thích</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link p-0" href="{{ url('cart') }}">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <p class=" text-dark fs-6 mb-3  me-3"><span
                                                            class="icon_bag_alt"></span></p>
                                                    <p class=" text-dark fs-6 mb-3 ">giỏ hàng</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li>
                                            <a href="#"
                                                class="nav-link p-0"onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <p class=" text-dark fs-6 mb-3  me-3"><i class="bi bi-door-open"></i>
                                                    </p>
                                                    <p class=" text-dark fs-6 mb-3 ">{{ __('Đăng xuất') }}</p>
                                                </div>
                                            </a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @else
                                        <li>
                                            <a href="{{ url('login') }}" class="nav-link p-0">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <p class=" text-dark fs-6 mb-3  me-3"><i
                                                            class="bi bi-door-closed"></i></p>
                                                    <p class=" text-dark fs-6 mb-3">Đăng nhập</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('register') }}" class="nav-link p-0">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <p class=" text-dark fs-6 mb-3  me-3"><i
                                                            class="bi bi-person-plus"></i></p>
                                                    <p class=" text-dark fs-6 mb-3">Đăng ký</p>
                                                </div>
                                            </a>
                                        </li>
                                    @endauth
                                </ul>
                            </li>
                            {{-- Cart icons --}}
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" class="nav-link p-0" type="button"
                                    data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                    aria-controls="offcanvasRight" href="#">
                                    <span class="icon_heart_alt"></span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-dark fs-5" href="{{ url('cart') }}">
                                    <span class="icon_bag_alt"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </header>

    <!-- Search Popup -->
    <div class="search-popup" id="searchPopup" style="display: none;">
        <div class="search-popup__overlay" id="closeSearchPopup"></div>
        <div class="search-popup__content">
            <div class="search-popup__close" id="closeSearchPopupBtn">&times;</div>
            <div class="search-popup__body">
                <div id="searchResults"></div>
            </div>
        </div>
    </div>
    {{-- login, cart, wishlist --}}
    <div class="offcanvas offcanvas-end" tabindex="-1" style="min-width: 35%" id="offcanvasRight"
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
                                                            alt="" class="img-thumbnail"
                                                            style="max-width: 100px;">
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
