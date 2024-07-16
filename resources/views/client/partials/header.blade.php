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
            <li>
                <form id="searchForm" action="{{ route('product.search') }}" method="GET">
                    <input type="text" name="keyword" placeholder="Search products..." required>
                    <button type="submit"><span class="icon_search search-switch"></span></button>
                </form>
            </li>
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

                {{-- login, cart, wishlist --}}
                <div class="col-lg-3">
                    <div class="header__right">
                        <div class="header__right__auth">
                            @auth
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="auto"
                                        fill="currentColor" class="bi bi-person-check" viewBox="0 0 16 16">
                                        <path
                                            d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.708l.547.548 1.17-1.951a.5.5 0 1 1 .858.514M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                                        <path
                                            d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
                                    </svg>
                                </a>

                                <a class="" href="{{ route('profile.edit') }}">Edit Profile</a>

                                <a class="" href="#"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                </form>
                            @else
                                <a href="{{ route('login') }}">Login /</a>
                                <a href="{{ route('register') }}">Register</a>
                            @endauth
                        </div>

                        <ul class="header__right__widget">
                            <li>
                                <a href="{{ route('wishlist.index') }}">
                                    <span class="icon_heart_alt"></span>
                                    <div class="tip">2</div>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('cart') }}">
                                    <span class="icon_bag_alt"></span>
                                </a>
                            </li>
                        </ul>
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
</body>

</html>
