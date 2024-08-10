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
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Css Styles -->
    <style>
        .menu {
            position: absolute;
            width: 100%;
            margin-top: .825rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: center;
            background-color: #FFFFFF;
            box-shadow: rgba(100, 100, 111, 0.2) 0px 7px 29px 0px;
            z-index: 99;
            visibility: hidden;
            top: 3.85rem;
        }

        .menu .item {
            font-size: medium;
            font-weight: bold;
            padding: 1.5rem 2rem;
        }

        .menu .item .title {
            color: black;
            cursor: pointer;
        }

        .menu .item:last-child {
            border-right: none;
        }

        .menu-group-item .menu-item {
            list-style: none;
        }

        .menu-item-link {
            font-size: .875rem;
            font-weight: 500;
            text-decoration: none;
            color: black;
        }

        .menu-item:hover .menu-item-link {
            color: black;
            border-bottom: 2px solid #ca1515;
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

<header class="header">
    <div class="container-fluid">

        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{ url('/') }}"><img src="{{ asset('theme-cli/img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul style="display: flex; justify-content: center; align-items: center;gap: 2rem">
                        @foreach ($menus as $menu)
                            <li
                                @if($menu->url == 'shop')
                                    class="menu-shop"
                                @endif
                            >
                                <a href="{{ url($menu->url) }}"
                                   class="{{ Request::is($menu->url) ? 'active' : '' }} active">
                                    {{ $menu->menu_item }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <ul class="header__right__widget">
                        @auth
                            {{-- edit profile --}}
                            <li>
                                <a href="{{ route('profile.edit') }}" class="text-dark fs-5">
                                    <i class="bi bi-person-badge"></i>
                                </a>
                            </li>
                            {{-- logout --}}
                            <li>
                                <a href="#" class=" text-dark fs-6"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            {{-- login --}}

                            <li>
                                <a href="{{--  javascript:void(0);--}}{{ url('login') }}" class=" text-dark fs-5"
                                   onclick="showLoginModal()">
                                    <i class="bi bi-person-badge"></i>
                                </a>
                            </li>
                        @endauth
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="{{ route('wishlist.index') }}"><span class="icon_heart_alt"></span>
                            </a></li>
                        <li><a href="{{ route('cart') }}"><span class="icon_bag_alt"></span>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>

</header>

<div class="menu">
    @foreach ($categories as $category)
        <div class="item">
            <a href="#" class="title">{{$category->name}}</a>
            <ul class="menu-group-item">
                @foreach ($category->catalogues as $catalogue)
                    <li class="menu-item">
                        <a href="#" class="menu-item-link">
                            {{$catalogue->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endforeach
    <div class="item" style="display: flex;gap: 1rem ">
        <img width="203" height="274" src="https://media.canifa.com/mega_menu/item/mgmn3.webp" alt="">
        <img width="203" height="274" src="https://media.canifa.com/mega_menu/item/mgmu1.webp" alt="">
    </div>
</div>

<script>
    let menuShop = document.querySelector('.menu-shop');
    let menu = document.querySelector('.menu');
    menuShop.onmouseover = function () {
        menu.style.visibility = 'visible';
    }
    menu.onmouseover = function () {
        menu.style.visibility = 'visible';
    }
    menu.onmouseout = function () {
        menu.style.visibility = 'hidden';
    }
</script>

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
