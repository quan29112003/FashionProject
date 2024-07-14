<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Css Styles -->
    <style>
        .payment-method {
            display: flex;
            flex-direction: column;
        }

        .custom-radio {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            font-size: 14px;
        }

        .custom-radio input[type="radio"] {
            margin-right: 10px;
        }
        .swatch-attribute-options {
            flex-wrap: wrap;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .swatch-option {
            width: 24px;
            height: 24px;
            min-width: 24px;
            display: inline-block;
            border-radius: 100%;
            margin-right: 8px;
            margin-bottom: 10px;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            border: 1px solid #e6e7e8;
            padding: 2px;
            background-clip: content-box !important;
            cursor: pointer;
        }

        .swatch-option.selected {
            border-color: #333f48;
        }
    </style>
    <link rel="stylesheet" href="{{ asset('theme-cli/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.css">

    <!-- CSS của Flatpickr -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <!-- JS của Flatpickr -->
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
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
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="{{ url('/') }}"><img src="{{ asset('theme-cli/img/logo.png') }}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="{{ route('login') }}">Login</a>
            <a href="{{ route('register') }}">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header ">

        <div class="p-2 header__desktop ">

            <div class="row align-items-center">

                {{-- tìm kiếm --}}
                <div class="col-12 my-3">
                    <div class="col d-flex justify-content-center">
                        <!-- Form tìm kiếm -->
                        <form role="search" id="searchForm" action="{{ route('product.search') }}" method="GET"
                            class="search-form">
                            <!-- Input tìm kiếm -->
                            <input class="search-input" type="search" name="keyword" id="searchInput"
                                placeholder="Search" aria-label="Search">
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

            <div class="row align-items-center">
                <div class="col-xl-3 d-flex justify-content-between">
                    {{-- logo --}}
                    <div>
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('theme-cli/img/logo.png') }}" alt="Logo">
                        </a>
                    </div>
                    {{-- categorygender --}}
                    <nav>
                        <ul class="nav ">
                            @foreach ($CategoryGenders as $CategoryGender)
                                <li class="nav-item">
                                    <a class="nav-link fs-5 text-dark fw-bold custom-hover"
                                        href="#">{{ $CategoryGender->name }}</a>
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
                                <li class="nav-item">
                                    <a href="{{ url($menu->url) }}"
                                        class="{{ Request::is($menu->url) ? 'active' : '' }} nav-link fs-6 text-dark custom-hover">
                                        {{ $menu->menu_item }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
                </div>

                {{-- search, login, cart, wishlist --}}
                <div class="col-xl-3">
                    <div class="row">
                        {{-- User actions (login, profile, logout) --}}
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <ul class="nav justify-content-end">
                                        @auth
                                            {{-- edit profile --}}
                                            <li class="nav-item">
                                                <a href="{{ route('profile.edit') }}" class="nav-link text-dark fs-5">
                                                    <i class="bi bi-person-badge"></i>
                                                </a>
                                            </li>
                                            {{-- logout --}}
                                            <li class="nav-item">
                                                <a href="#" class="nav-link text-dark fs-6"
                                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        @else
                                            {{-- login --}}

                                            <li class="nav-item">
                                                <a href="{{--  javascript:void(0);--}}{{ url('login') }}" class="nav-link text-dark fs-5"
                                                    onclick="showLoginModal()">
                                                    <i class="bi bi-person-badge"></i>
                                                </a>
                                            </li>
                                        @endauth

                                        {{-- Cart icons --}}
                                        <li class="nav-item">
                                            <a class="nav-link text-dark fs-5" href="{{ route('wishlist.index') }}">
                                                <span class="icon_heart_alt"></span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-dark fs-5" href="{{ route('cart') }}">
                                                <span class="icon_bag_alt"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row align-items-center">
                {{-- category --}}
                <div class="col">
                    <nav>
                        <ul class="nav justify-content-center">
                            @foreach ($categories as $categorie)
                                <li class="nav-item">
                                    <a href="#" class="nav-link fs-6 text-dark custom-hover">
                                        {{ $categorie->name }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </nav>
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


</body>

</html>
