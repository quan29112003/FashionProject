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

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{ asset('theme-cli/css/bootstrap.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/font-awesome.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/elegant-icons.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/jquery-ui.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/owl.carousel.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/slicknav.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('theme-cli/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mixitup/3.3.1/mixitup.min.css">
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
            <a href=""><img src="{{ asset('theme-cli/img/logo.png') }}" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Login</a>
            <a href="#">Register</a>
        </div>
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container-fluid">
            <div class="row">

                {{-- logo --}}
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="#">
                            <img src="{{ asset('theme-cli/img/logo.png') }}" alt="">
                        </a>
                    </div>
                </div>

                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        {{-- menus --}}
                        <ul>
                            {{-- categories --}}
                            @foreach ($CategoryGenders as $CategoryGender)
                                <li class="gender_category">
                                    <a href="#">{{ $CategoryGender->name }}</a>
                                </li>
                            @endforeach

                            @foreach ($menus as $menu)
                                <li class="{{ Request::is($menu->url) ? 'active' : '' }}">
                                    <a href="{{ url($menu->url) }}">{{ $menu->menu_item }}
                                    </a>
                                </li>
                            @endforeach

                            {{-- search --}}
                            <li class="search">
                                <div class="header__search">
                                    <form id="searchForm" action="{{ route('product.search') }}" method="GET">
                                        <input type="text" name="keyword" id="searchInput" placeholder="Search...">
                                        <button type="submit">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </form>
                                </div>
                            </li>
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
                                <a href="#">
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
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
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

    <!-- JS Plugins -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Show search popup when clicking on search icon
            $('.search-switch').on('click', function() {
                $('#searchPopup').fadeIn();
            });

            // Close search popup when clicking on close button or overlay
            $('#closeSearchPopup, #closeSearchPopupBtn').on('click', function() {
                $('#searchPopup').fadeOut();
            });

            // Handle form submission for search
            $('#searchForm').on('submit', function(event) {
                event.preventDefault();
                var query = $('#searchInput').val();
                if (query.trim() !== '') {
                    searchProducts(query);
                    // searchProducts(query);
                }
            });

            // Function to perform AJAX search
            function searchProducts(query) {
                $.ajax({
                    url: '{{ route('product.search') }}',
                    type: 'GET',
                    data: {
                        keyword: query
                    },
                    success: function(response) {
                        $('#searchResults').html(response);
                        $('#searchPopup').fadeIn();
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            }
        });
    </script>

</body>

</html>
