<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg" data-sidebar-image="none" data-preloader="disable">
    <head>

        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <!-- jsvectormap css -->
        <link href="{{ asset('assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet" type="text/css" />

        <!--Swiper slider css-->
        <link href="assets/libs/swiper/swiper-bundle.min.css" rel="stylesheet" type="text/css" />

        <!-- Layout config Js -->
        <script src="assets/js/layout.js"></script>
        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />
        <!-- custom Css-->
        <link href="assets/css/custom.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body>

        <!-- Begin page -->
        <div id="layout-wrapper">

            <header id="page-topbar">
        <div class="layout-width">
            <div class="navbar-header">
                <div class="d-flex">
                    <!-- LOGO -->
                    <div class="navbar-brand-box horizontal-logo">
                        <a href="index.html" class="logo logo-dark">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-dark.png" alt="" height="17">
                            </span>
                        </a>

                        <a href="index.html" class="logo logo-light">
                            <span class="logo-sm">
                                <img src="assets/images/logo-sm.png" alt="" height="22">
                            </span>
                            <span class="logo-lg">
                                <img src="assets/images/logo-light.png" alt="" height="17">
                            </span>
                        </a>
                    </div>

                    <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger" id="topnav-hamburger-icon">
                        <span class="hamburger-icon">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </button>

                    <!-- App Search-->
                    <form class="app-search d-none d-md-block">
                        <div class="position-relative">
                            <input type="text" class="form-control" placeholder="Search..." autocomplete="off" id="search-options" value="">
                            <span class="mdi mdi-magnify search-widget-icon"></span>
                            <span class="mdi mdi-close-circle search-widget-icon search-widget-icon-close d-none" id="search-close-options"></span>
                        </div>
                        <div class="dropdown-menu dropdown-menu-lg" id="search-dropdown">
                            <div data-simplebar style="max-height: 320px;">
                                <!-- item-->
                                <div class="dropdown-header">
                                    <h6 class="text-overflow text-muted mb-0 text-uppercase">Recent Searches</h6>
                                </div>

                                <div class="dropdown-item bg-transparent text-wrap">
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">how to setup <i class="mdi mdi-magnify ms-1"></i></a>
                                    <a href="index.html" class="btn btn-soft-secondary btn-sm rounded-pill">buttons <i class="mdi mdi-magnify ms-1"></i></a>
                                </div>
                                <!-- item-->
                                <div class="dropdown-header mt-2">
                                    <h6 class="text-overflow text-muted mb-1 text-uppercase">Pages</h6>
                                </div>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-bubble-chart-line align-middle fs-18 text-muted me-2"></i>
                                    <span>Analytics Dashboard</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-lifebuoy-line align-middle fs-18 text-muted me-2"></i>
                                    <span>Help Center</span>
                                </a>

                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item notify-item">
                                    <i class="ri-user-settings-line align-middle fs-18 text-muted me-2"></i>
                                    <span>My account settings</span>
                                </a>

                                <!-- item-->
                                <div class="dropdown-header mt-2">
                                    <h6 class="text-overflow text-muted mb-2 text-uppercase">Members</h6>
                                </div>

                                <div class="notification-list">
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                        <div class="d-flex">
                                            <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">Angela Bernier</h6>
                                                <span class="fs-11 mb-0 text-muted">Manager</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                        <div class="d-flex">
                                            <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">David Grasso</h6>
                                                <span class="fs-11 mb-0 text-muted">Web Designer</span>
                                            </div>
                                        </div>
                                    </a>
                                    <!-- item -->
                                    <a href="javascript:void(0);" class="dropdown-item notify-item py-2">
                                        <div class="d-flex">
                                            <img src="assets/images/users/avatar-5.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="m-0">Mike Bunch</h6>
                                                <span class="fs-11 mb-0 text-muted">React Developer</span>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="text-center pt-3 pb-1">
                                <a href="pages-search-results.html" class="btn btn-primary btn-sm">View All Results <i class="ri-arrow-right-line ms-1"></i></a>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="d-flex align-items-center">

                    <div class="dropdown d-md-none topbar-head-dropdown header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-search-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="bx bx-search fs-22"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-search-dropdown">
                            <form class="p-3">
                                <div class="form-group m-0">
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Search ..." aria-label="Recipient's username">
                                        <button class="btn btn-primary" type="submit"><i class="mdi mdi-magnify"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="dropdown ms-1 topbar-head-dropdown header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img id="header-lang-img" src="assets/images/flags/us.svg" alt="Header Language" height="20" class="rounded">
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language py-2" data-lang="en" title="English">
                                <img src="assets/images/flags/us.svg" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">English</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="sp" title="Spanish">
                                <img src="assets/images/flags/spain.svg" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">Española</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="gr" title="German">
                                <img src="assets/images/flags/germany.svg" alt="user-image" class="me-2 rounded" height="18"> <span class="align-middle">Deutsche</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="it" title="Italian">
                                <img src="assets/images/flags/italy.svg" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">Italiana</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ru" title="Russian">
                                <img src="assets/images/flags/russia.svg" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">русский</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ch" title="Chinese">
                                <img src="assets/images/flags/china.svg" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">中国人</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="fr" title="French">
                                <img src="assets/images/flags/french.svg" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">français</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item language" data-lang="ar" title="Arabic">
                                <img src="assets/images/flags/ae.svg" alt="user-image" class="me-2 rounded" height="18">
                                <span class="align-middle">Arabic</span>
                            </a>
                        </div>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-category-alt fs-22'></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg p-0 dropdown-menu-end">
                            <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fw-semibold fs-15"> Web Apps </h6>
                                    </div>
                                    <div class="col-auto">
                                        <a href="#!" class="btn btn-sm btn-soft-info"> View All Apps
                                            <i class="ri-arrow-right-s-line align-middle"></i></a>
                                    </div>
                                </div>
                            </div>

                            <div class="p-2">
                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="assets/images/brands/github.png" alt="Github">
                                            <span>GitHub</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="assets/images/brands/bitbucket.png" alt="bitbucket">
                                            <span>Bitbucket</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="assets/images/brands/dribbble.png" alt="dribbble">
                                            <span>Dribbble</span>
                                        </a>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="assets/images/brands/dropbox.png" alt="dropbox">
                                            <span>Dropbox</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="assets/images/brands/mail_chimp.png" alt="mail_chimp">
                                            <span>Mail Chimp</span>
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="dropdown-icon-item" href="#!">
                                            <img src="assets/images/brands/slack.png" alt="slack">
                                            <span>Slack</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-cart-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-shopping-bag fs-22'></i>
                            <span class="position-absolute topbar-badge cartitem-badge fs-10 translate-middle badge rounded-pill bg-info">5</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-xl dropdown-menu-end p-0 dropdown-menu-cart" aria-labelledby="page-header-cart-dropdown">
                            <div class="p-3 border-top-0 border-start-0 border-end-0 border-dashed border">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h6 class="m-0 fs-16 fw-semibold"> My Cart</h6>
                                    </div>
                                    <div class="col-auto">
                                        <span class="badge bg-warning-subtle text-warning fs-13"><span class="cartitem-badge">7</span>
                                            items</span>
                                    </div>
                                </div>
                            </div>
                            <div data-simplebar style="max-height: 300px;">
                                <div class="p-2">
                                    <div class="text-center empty-cart" id="empty-cart">
                                        <div class="avatar-md mx-auto my-3">
                                            <div class="avatar-title bg-info-subtle text-info fs-36 rounded-circle">
                                                <i class='bx bx-cart'></i>
                                            </div>
                                        </div>
                                        <h5 class="mb-3">Your Cart is Empty!</h5>
                                        <a href="apps-ecommerce-products.html" class="btn btn-success w-md mb-3">Shop Now</a>
                                    </div>
                                    <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/products/img-1.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">
                                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Branded
                                                        T-Shirts</a>
                                                </h6>
                                                <p class="mb-0 fs-12 text-muted">
                                                    Quantity: <span>10 x $32</span>
                                                </p>
                                            </div>
                                            <div class="px-2">
                                                <h5 class="m-0 fw-normal">$<span class="cart-item-price">320</span></h5>
                                            </div>
                                            <div class="ps-2">
                                                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/products/img-2.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">
                                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Bentwood Chair</a>
                                                </h6>
                                                <p class="mb-0 fs-12 text-muted">
                                                    Quantity: <span>5 x $18</span>
                                                </p>
                                            </div>
                                            <div class="px-2">
                                                <h5 class="m-0 fw-normal">$<span class="cart-item-price">89</span></h5>
                                            </div>
                                            <div class="ps-2">
                                                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/products/img-3.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">
                                                    <a href="apps-ecommerce-product-details.html" class="text-reset">
                                                        Borosil Paper Cup</a>
                                                </h6>
                                                <p class="mb-0 fs-12 text-muted">
                                                    Quantity: <span>3 x $250</span>
                                                </p>
                                            </div>
                                            <div class="px-2">
                                                <h5 class="m-0 fw-normal">$<span class="cart-item-price">750</span></h5>
                                            </div>
                                            <div class="ps-2">
                                                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/products/img-6.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">
                                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Gray
                                                        Styled T-Shirt</a>
                                                </h6>
                                                <p class="mb-0 fs-12 text-muted">
                                                    Quantity: <span>1 x $1250</span>
                                                </p>
                                            </div>
                                            <div class="px-2">
                                                <h5 class="m-0 fw-normal">$ <span class="cart-item-price">1250</span></h5>
                                            </div>
                                            <div class="ps-2">
                                                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-block dropdown-item dropdown-item-cart text-wrap px-3 py-2">
                                        <div class="d-flex align-items-center">
                                            <img src="assets/images/products/img-5.png" class="me-3 rounded-circle avatar-sm p-2 bg-light" alt="user-pic">
                                            <div class="flex-grow-1">
                                                <h6 class="mt-0 mb-1 fs-14">
                                                    <a href="apps-ecommerce-product-details.html" class="text-reset">Stillbird Helmet</a>
                                                </h6>
                                                <p class="mb-0 fs-12 text-muted">
                                                    Quantity: <span>2 x $495</span>
                                                </p>
                                            </div>
                                            <div class="px-2">
                                                <h5 class="m-0 fw-normal">$<span class="cart-item-price">990</span></h5>
                                            </div>
                                            <div class="ps-2">
                                                <button type="button" class="btn btn-icon btn-sm btn-ghost-secondary remove-item-btn"><i class="ri-close-fill fs-16"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-3 border-bottom-0 border-start-0 border-end-0 border-dashed border" id="checkout-elem">
                                <div class="d-flex justify-content-between align-items-center pb-3">
                                    <h5 class="m-0 text-muted">Total:</h5>
                                    <div class="px-2">
                                        <h5 class="m-0" id="cart-item-total">$1258.58</h5>
                                    </div>
                                </div>

                                <a href="apps-ecommerce-checkout.html" class="btn btn-success text-center w-100">
                                    Checkout
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" data-toggle="fullscreen">
                            <i class='bx bx-fullscreen fs-22'></i>
                        </button>
                    </div>

                    <div class="ms-1 header-item d-none d-sm-flex">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                            <i class='bx bx-moon fs-22'></i>
                        </button>
                    </div>

                    <div class="dropdown topbar-head-dropdown ms-1 header-item" id="notificationDropdown">
                        <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-bell fs-22'></i>
                            <span class="position-absolute topbar-badge fs-10 translate-middle badge rounded-pill bg-danger">3<span class="visually-hidden">unread messages</span></span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0" aria-labelledby="page-header-notifications-dropdown">

                            <div class="dropdown-head bg-primary bg-pattern rounded-top">
                                <div class="p-3">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h6 class="m-0 fs-16 fw-semibold text-white"> Notifications </h6>
                                        </div>
                                        <div class="col-auto dropdown-tabs">
                                            <span class="badge bg-light-subtle text-body fs-13"> 4 New</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="px-2 pt-2">
                                    <ul class="nav nav-tabs dropdown-tabs nav-tabs-custom" data-dropdown-tabs="true" id="notificationItemsTab" role="tablist">
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#all-noti-tab" role="tab" aria-selected="true">
                                                All (4)
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#messages-tab" role="tab" aria-selected="false">
                                                Messages
                                            </a>
                                        </li>
                                        <li class="nav-item waves-effect waves-light">
                                            <a class="nav-link" data-bs-toggle="tab" href="#alerts-tab" role="tab" aria-selected="false">
                                                Alerts
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="tab-content position-relative" id="notificationItemsTabContent">
                                <div class="tab-pane fade show active py-2 ps-2" id="all-noti-tab" role="tabpanel">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <div class="avatar-xs me-3 flex-shrink-0">
                                                    <span class="avatar-title bg-info-subtle text-info rounded-circle fs-16">
                                                        <i class="bx bx-badge-check"></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-2 lh-base">Your <b>Elite</b> author Graphic
                                                            Optimization <span class="text-secondary">reward</span> is
                                                            ready!
                                                        </h6>
                                                    </a>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> Just 30 sec ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="all-notification-check01">
                                                        <label class="form-check-label" for="all-notification-check01"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                            graph 🔔.</p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 48 min ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="all-notification-check02">
                                                        <label class="form-check-label" for="all-notification-check02"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <div class="avatar-xs me-3 flex-shrink-0">
                                                    <span class="avatar-title bg-danger-subtle text-danger rounded-circle fs-16">
                                                        <i class='bx bx-message-square-dots'></i>
                                                    </span>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-2 fs-13 lh-base">You have received <b class="text-success">20</b> new messages in the conversation
                                                        </h6>
                                                    </a>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="all-notification-check03">
                                                        <label class="form-check-label" for="all-notification-check03"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item position-relative">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs flex-shrink-0" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">We talked about a project on linkedin.</p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 4 hrs ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="all-notification-check04">
                                                        <label class="form-check-label" for="all-notification-check04"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-3 text-center view-all">
                                            <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                                All Notifications <i class="ri-arrow-right-line align-middle"></i></button>
                                        </div>
                                    </div>

                                </div>

                                <div class="tab-pane fade py-2 ps-2" id="messages-tab" role="tabpanel" aria-labelledby="messages-tab">
                                    <div data-simplebar style="max-height: 300px;" class="pe-2">
                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-3.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">James Lemire</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">We talked about a project on linkedin.</p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 30 min ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="messages-notification-check01">
                                                        <label class="form-check-label" for="messages-notification-check01"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-2.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">Angela Bernier</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">Answered to your comment on the cash flow forecast's
                                                            graph 🔔.</p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 2 hrs ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="messages-notification-check02">
                                                        <label class="form-check-label" for="messages-notification-check02"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-6.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">Kenneth Brown</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">Mentionned you in his comment on 📃 invoice #12501.
                                                        </p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 10 hrs ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="messages-notification-check03">
                                                        <label class="form-check-label" for="messages-notification-check03"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-reset notification-item d-block dropdown-item">
                                            <div class="d-flex">
                                                <img src="assets/images/users/avatar-8.jpg" class="me-3 rounded-circle avatar-xs" alt="user-pic">
                                                <div class="flex-grow-1">
                                                    <a href="#!" class="stretched-link">
                                                        <h6 class="mt-0 mb-1 fs-13 fw-semibold">Maureen Gibson</h6>
                                                    </a>
                                                    <div class="fs-13 text-muted">
                                                        <p class="mb-1">We talked about a project on linkedin.</p>
                                                    </div>
                                                    <p class="mb-0 fs-11 fw-medium text-uppercase text-muted">
                                                        <span><i class="mdi mdi-clock-outline"></i> 3 days ago</span>
                                                    </p>
                                                </div>
                                                <div class="px-2 fs-15">
                                                    <div class="form-check notification-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="messages-notification-check04">
                                                        <label class="form-check-label" for="messages-notification-check04"></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="my-3 text-center view-all">
                                            <button type="button" class="btn btn-soft-success waves-effect waves-light">View
                                                All Messages <i class="ri-arrow-right-line align-middle"></i></button>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade p-4" id="alerts-tab" role="tabpanel" aria-labelledby="alerts-tab"></div>

                                <div class="notification-actions" id="notification-actions">
                                    <div class="d-flex text-muted justify-content-center">
                                        Select <div id="select-content" class="text-body fw-semibold px-1">0</div> Result <button type="button" class="btn btn-link link-danger p-0 ms-3" data-bs-toggle="modal" data-bs-target="#removeNotificationModal">Remove</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dropdown ms-sm-3 header-item topbar-user">
                        <button type="button" class="btn" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="d-flex align-items-center">
                                <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-1.jpg" alt="Header Avatar">
                                <span class="text-start ms-xl-2">
                                    <span class="d-none d-xl-inline-block ms-1 fw-medium user-name-text">Anna Adame</span>
                                    <span class="d-none d-xl-block ms-1 fs-12 user-name-sub-text">Founder</span>
                                </span>
                            </span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <h6 class="dropdown-header">Welcome Anna!</h6>
                            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-account-circle text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Profile</span></a>
                            <a class="dropdown-item" href="apps-chat.html"><i class="mdi mdi-message-text-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Messages</span></a>
                            <a class="dropdown-item" href="apps-tasks-kanban.html"><i class="mdi mdi-calendar-check-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Taskboard</span></a>
                            <a class="dropdown-item" href="pages-faqs.html"><i class="mdi mdi-lifebuoy text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Help</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="pages-profile.html"><i class="mdi mdi-wallet text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Balance : <b>$5971.67</b></span></a>
                            <a class="dropdown-item" href="pages-profile-settings.html"><span class="badge bg-success-subtle text-success mt-1 float-end">New</span><i class="mdi mdi-cog-outline text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Settings</span></a>
                            <a class="dropdown-item" href="auth-lockscreen-basic.html"><i class="mdi mdi-lock text-muted fs-16 align-middle me-1"></i> <span class="align-middle">Lock screen</span></a>
                            <a class="dropdown-item" href="auth-logout-basic.html"><i class="mdi mdi-logout text-muted fs-16 align-middle me-1"></i> <span class="align-middle" data-key="t-logout">Logout</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- removeNotificationModal -->
    <div id="removeNotificationModal" class="modal fade zoomIn" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="NotificationModalbtn-close"></button>
                </div>
                <div class="modal-body">
                    <div class="mt-2 text-center">
                        <lord-icon src="https://cdn.lordicon.com/gsqxdxog.json" trigger="loop" colors="primary:#f7b84b,secondary:#f06548" style="width:100px;height:100px"></lord-icon>
                        <div class="mt-4 pt-2 fs-15 mx-4 mx-sm-5">
                            <h4>Are you sure ?</h4>
                            <p class="text-muted mx-4 mb-0">Are you sure you want to remove this Notification ?</p>
                        </div>
                    </div>
                    <div class="d-flex gap-2 justify-content-center mt-4 mb-2">
                        <button type="button" class="btn w-sm btn-light" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn w-sm btn-danger" id="delete-notification">Yes, Delete It!</button>
                    </div>
                </div>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
            <!-- ========== App Menu ========== -->
            <div class="app-menu navbar-menu">
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <!-- Dark Logo-->
                    <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="17">
                        </span>
                    </a>
                    <!-- Light Logo-->
                    <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="17">
                        </span>
                    </a>
                    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                        <i class="ri-record-circle-line"></i>
                    </button>
                </div>

                <div id="scrollbar">
                    <div class="container-fluid">

                        <div id="two-column-menu">
                        </div>
                        <ul class="navbar-nav" id="navbar-nav">
                            <a class="nav-link menu-link active" href="#" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                                <i class="ri-dashboard-2-line"></i> <span data-key="t-ecommerce">Dashboards</span>
                            </a>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>

                <div class="sidebar-background"></div>
            </div>
            <!-- Left Sidebar End -->
            <!-- Vertical Overlay-->
            <div class="vertical-overlay"></div>

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col">

                                <div class="h-100">
                                    <div class="row mb-3 pb-1">
                                        <div class="col-12">
                                            <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                                <div class="flex-grow-1">
                                                    <h4 class="fs-16 mb-1">Good Morning, Anna!</h4>
                                                    <p class="text-muted mb-0">Here's what's happening with your store today.</p>
                                                </div>
                                                <div class="mt-3 mt-lg-0">
                                                    <form action="javascript:void(0);">
                                                        <div class="row g-3 mb-0 align-items-center">
                                                            <div class="col-sm-auto">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control border-0 dash-filter-picker shadow" data-provider="flatpickr" data-range-date="true" data-date-format="d M, Y" data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                                                    <div class="input-group-text bg-primary border-primary text-white">
                                                                        <i class="ri-calendar-2-line"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-auto">
                                                                <button type="button" class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i> Add Product</button>
                                                            </div>
                                                            <!--end col-->
                                                            <div class="col-auto">
                                                                <button type="button" class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i class="ri-pulse-line"></i></button>
                                                            </div>
                                                            <!--end col-->
                                                        </div>
                                                        <!--end row-->
                                                    </form>
                                                </div>
                                            </div><!-- end card header -->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->

                                    <div class="row">
                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Tổng thu phập</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h5 class="text-success fs-14 mb-0">
                                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target={{$data->order}}>0</span>k </h4>
                                                            <a href="" class="text-decoration-underline">View net earnings</a>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-success-subtle rounded fs-3">
                                                                <i class="bx bx-dollar-circle text-success"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                         <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Đơn hàng</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h5 class="text-danger fs-14 mb-0">
                                                                <i class="ri-arrow-right-down-line fs-13 align-middle"></i> -3.57 %
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target={{$data->order}}>0</span></h4>
                                                            <a href="" class="text-decoration-underline">View all orders</a>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                                                <i class="bx bx-shopping-bag text-info"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách hàng</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h5 class="text-success fs-14 mb-0">
                                                                <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +29.08 %
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value" data-target={{$data->order}}>0</span>M </h4>
                                                            <a href="" class="text-decoration-underline">See details</a>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                                                <i class="bx bx-user-circle text-warning"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->

                                        <div class="col-xl-3 col-md-6">
                                            <!-- card -->
                                            <div class="card card-animate">
                                                <div class="card-body">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1 overflow-hidden">
                                                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Số dư</p>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h5 class="text-muted fs-14 mb-0">
                                                                +0.00 %
                                                            </h5>
                                                        </div>
                                                    </div>
                                                    <div class="d-flex align-items-end justify-content-between mt-4">
                                                        <div>
                                                            <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value" data-target={{$data->order}}>0</span>k </h4>
                                                            <a href="" class="text-decoration-underline">Withdraw money</a>
                                                        </div>
                                                        <div class="avatar-sm flex-shrink-0">
                                                            <span class="avatar-title bg-primary-subtle rounded fs-3">
                                                                <i class="bx bx-wallet text-primary"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                    </div> <!-- end row-->

                                    <div class="row">
                                        <div class="col-xl-8">
                                            <div class="card">
                                                <div class="card-header border-0 align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Doanh Thu</h4>
                                                    <div>
                                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                                            ALL
                                                        </button>
                                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                                            1M
                                                        </button>
                                                        <button type="button" class="btn btn-soft-secondary btn-sm">
                                                            6M
                                                        </button>
                                                        <button type="button" class="btn btn-soft-primary btn-sm">
                                                            1Y
                                                        </button>
                                                    </div>
                                                </div><!-- end card header -->

                                                <div class="card-header p-0 border-0 bg-light-subtle">
                                                    <div class="row g-0 text-center">
                                                        <div class="col-6 col-sm-3">
                                                            <div class="p-3 border border-dashed border-start-0">
                                                                <h5 class="mb-1"><span class="counter-value" data-target={{ $data->order }}>0</span></h5>
                                                                <p class="text-muted mb-0">Đơn hàng</p>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-6 col-sm-3">
                                                            <div class="p-3 border border-dashed border-start-0">
                                                                <h5 class="mb-1">$<span class="counter-value" data-target="{{ $data->earn }}">0</span>k</h5>
                                                                <p class="text-muted mb-0">Thu nhập</p>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                        <div class="col-6 col-sm-3">
                                                            <div class="p-3 border border-dashed border-start-0">
                                                                <h5 class="mb-1"><span class="counter-value" data-target={{ $data->refund }}>0</span></h5>
                                                                <p class="text-muted mb-0">Hoàn tiền</p>
                                                            </div>
                                                        </div>
                                                        <!--end col-->
                                                    </div>
                                                </div><!-- end card header -->

                                                <div class="card-body p-0 pb-2">
                                                    <div class="w-100">
                                                        <div id="data_charts" data-orders={{collect($data->orders)->implode('-')}}
                                                            data-earns={{collect($data->earns)->implode('-')}}
                                                            data-refunds={{collect($data->refunds)->implode('-')}}></div>
                                                        <div id="customer_impression_charts" data-colors='["--vz-primary", "--vz-success", "--vz-danger"]' class="apex-charts" dir="ltr"></div>
                                                    </div>
                                                </div><!-- end card body -->
                                            </div><!-- end card -->
                                        </div><!-- end col -->
                                        <!-- end col -->
                                        <div class="col-xl-4">
                                            <div class="card card-height-100">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Lượt xem</h4>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown card-header-dropdown">
                                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Download Report</a>
                                                                <a class="dropdown-item" href="#">Export</a>
                                                                <a class="dropdown-item" href="#">Import</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end card header -->

                                                <div class="card-body">
                                                    <div id="data_chart_donut" data-views={{collect($data->views)->implode('-')}}></div>
                                                    <div id="store-visits-source" data-colors='["--vz-primary", "--vz-success", "--vz-warning", "--vz-danger", "--vz-info"]' class="apex-charts" dir="ltr"></div>
                                                </div>
                                            </div> <!-- .card-->

                                    </div>

                                    <div class="row">
                                        <div class="col-xl-6">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Best Selling Products</h4>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown card-header-dropdown">
                                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="fw-semibold text-uppercase fs-12">Sort by:
                                                                </span><span class="text-muted">Today<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Today</a>
                                                                <a class="dropdown-item" href="#">Yesterday</a>
                                                                <a class="dropdown-item" href="#">Last 7 Days</a>
                                                                <a class="dropdown-item" href="#">Last 30 Days</a>
                                                                <a class="dropdown-item" href="#">This Month</a>
                                                                <a class="dropdown-item" href="#">Last Month</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end card header -->

                                                <div class="card-body">
                                                    <div class="table-responsive table-card">
                                                        <table class="table table-hover table-centered align-middle table-nowrap mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                <img src="assets/images/products/img-1.png" alt="" class="img-fluid d-block" />
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">Branded T-Shirts</a></h5>
                                                                                <span class="text-muted">24 Apr 2021</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$29.00</h5>
                                                                        <span class="text-muted">Price</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">62</h5>
                                                                        <span class="text-muted">Orders</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">510</h5>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$1,798</h5>
                                                                        <span class="text-muted">Amount</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                <img src="assets/images/products/img-2.png" alt="" class="img-fluid d-block" />
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">Bentwood Chair</a></h5>
                                                                                <span class="text-muted">19 Mar 2021</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$85.20</h5>
                                                                        <span class="text-muted">Price</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">35</h5>
                                                                        <span class="text-muted">Orders</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal"><span class="badge bg-danger-subtle text-danger">Out of stock</span> </h5>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$2982</h5>
                                                                        <span class="text-muted">Amount</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                <img src="assets/images/products/img-3.png" alt="" class="img-fluid d-block" />
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">Borosil Paper Cup</a></h5>
                                                                                <span class="text-muted">01 Mar 2021</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$14.00</h5>
                                                                        <span class="text-muted">Price</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">80</h5>
                                                                        <span class="text-muted">Orders</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">749</h5>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$1120</h5>
                                                                        <span class="text-muted">Amount</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                <img src="assets/images/products/img-4.png" alt="" class="img-fluid d-block" />
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">One Seater Sofa</a></h5>
                                                                                <span class="text-muted">11 Feb 2021</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$127.50</h5>
                                                                        <span class="text-muted">Price</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">56</h5>
                                                                        <span class="text-muted">Orders</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal"><span class="badge bg-danger-subtle text-danger">Out of stock</span></h5>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$7140</h5>
                                                                        <span class="text-muted">Amount</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                                <img src="assets/images/products/img-5.png" alt="" class="img-fluid d-block" />
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="fs-14 my-1"><a href="apps-ecommerce-product-details.html" class="text-reset">Stillbird Helmet</a></h5>
                                                                                <span class="text-muted">17 Jan 2021</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$54</h5>
                                                                        <span class="text-muted">Price</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">74</h5>
                                                                        <span class="text-muted">Orders</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">805</h5>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 my-1 fw-normal">$3996</h5>
                                                                        <span class="text-muted">Amount</span>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>

                                                    <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                                        <div class="col-sm">
                                                            <div class="text-muted">
                                                                Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">25</span> Results
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-auto  mt-3 mt-sm-0">
                                                            <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center">
                                                                <li class="page-item disabled">
                                                                    <a href="#" class="page-link">←</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="#" class="page-link">1</a>
                                                                </li>
                                                                <li class="page-item active">
                                                                    <a href="#" class="page-link">2</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="#" class="page-link">3</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="#" class="page-link">→</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-6">
                                            <div class="card card-height-100">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Top Sellers</h4>
                                                    <div class="flex-shrink-0">
                                                        <div class="dropdown card-header-dropdown">
                                                            <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <span class="text-muted">Report<i class="mdi mdi-chevron-down ms-1"></i></span>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-end">
                                                                <a class="dropdown-item" href="#">Download Report</a>
                                                                <a class="dropdown-item" href="#">Export</a>
                                                                <a class="dropdown-item" href="#">Import</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- end card header -->

                                                <div class="card-body">
                                                    <div class="table-responsive table-card">
                                                        <table class="table table-centered table-hover align-middle table-nowrap mb-0">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/companies/img-1.png" alt="" class="avatar-sm p-2" />
                                                                            </div>
                                                                            <div>
                                                                                <h5 class="fs-14 my-1 fw-medium">
                                                                                    <a href="apps-ecommerce-seller-details.html" class="text-reset">iTest Factory</a>
                                                                                </h5>
                                                                                <span class="text-muted">Oliver Tyler</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">Bags and Wallets</span>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0">8547</p>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">$541200</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 mb-0">32%<i class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i></h5>
                                                                    </td>
                                                                </tr><!-- end -->
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/companies/img-2.png" alt="" class="avatar-sm p-2" />
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 my-1 fw-medium"><a href="apps-ecommerce-seller-details.html" class="text-reset">Digitech Galaxy</a></h5>
                                                                                <span class="text-muted">John Roberts</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">Watches</span>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0">895</p>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">$75030</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 mb-0">79%<i class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i></h5>
                                                                    </td>
                                                                </tr><!-- end -->
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/companies/img-3.png" alt="" class="avatar-sm p-2" />
                                                                            </div>
                                                                            <div class="flex-gow-1">
                                                                                <h5 class="fs-14 my-1 fw-medium"><a href="apps-ecommerce-seller-details.html" class="text-reset">Nesta Technologies</a></h5>
                                                                                <span class="text-muted">Harley Fuller</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">Bike Accessories</span>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0">3470</p>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">$45600</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 mb-0">90%<i class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i></h5>
                                                                    </td>
                                                                </tr><!-- end -->
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/companies/img-8.png" alt="" class="avatar-sm p-2" />
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 my-1 fw-medium"><a href="apps-ecommerce-seller-details.html" class="text-reset">Zoetic Fashion</a></h5>
                                                                                <span class="text-muted">James Bowen</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">Clothes</span>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0">5488</p>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">$29456</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 mb-0">40%<i class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i></h5>
                                                                    </td>
                                                                </tr><!-- end -->
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/companies/img-5.png" alt="" class="avatar-sm p-2" />
                                                                            </div>
                                                                            <div class="flex-grow-1">
                                                                                <h5 class="fs-14 my-1 fw-medium">
                                                                                    <a href="apps-ecommerce-seller-details.html" class="text-reset">Meta4Systems</a>
                                                                                </h5>
                                                                                <span class="text-muted">Zoe Dennis</span>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">Furniture</span>
                                                                    </td>
                                                                    <td>
                                                                        <p class="mb-0">4100</p>
                                                                        <span class="text-muted">Stock</span>
                                                                    </td>
                                                                    <td>
                                                                        <span class="text-muted">$11260</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 mb-0">57%<i class="ri-bar-chart-fill text-success fs-16 align-middle ms-2"></i></h5>
                                                                    </td>
                                                                </tr><!-- end -->
                                                            </tbody>
                                                        </table><!-- end table -->
                                                    </div>

                                                    <div class="align-items-center mt-4 pt-2 justify-content-between row text-center text-sm-start">
                                                        <div class="col-sm">
                                                            <div class="text-muted">
                                                                Showing <span class="fw-semibold">5</span> of <span class="fw-semibold">25</span> Results
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-auto  mt-3 mt-sm-0">
                                                            <ul class="pagination pagination-separated pagination-sm mb-0 justify-content-center">
                                                                <li class="page-item disabled">
                                                                    <a href="#" class="page-link">←</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="#" class="page-link">1</a>
                                                                </li>
                                                                <li class="page-item active">
                                                                    <a href="#" class="page-link">2</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="#" class="page-link">3</a>
                                                                </li>
                                                                <li class="page-item">
                                                                    <a href="#" class="page-link">→</a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>

                                                </div> <!-- .card-body-->
                                            </div> <!-- .card-->
                                        </div> <!-- .col-->
                                    </div> <!-- end row-->

                                        <div class="col-xl-12">
                                            <div class="card">
                                                <div class="card-header align-items-center d-flex">
                                                    <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                                                    <div class="flex-shrink-0">
                                                        <button type="button" class="btn btn-soft-info btn-sm">
                                                            <i class="ri-file-list-3-line align-middle"></i> Generate Report
                                                        </button>
                                                    </div>
                                                </div><!-- end card header -->

                                                <div class="card-body">
                                                    <div class="table-responsive table-card">
                                                        <table class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                                            <thead class="text-muted table-light">
                                                                <tr>
                                                                    <th scope="col">Order ID</th>
                                                                    <th scope="col">Customer</th>
                                                                    <th scope="col">Product</th>
                                                                    <th scope="col">Amount</th>
                                                                    <th scope="col">Vendor</th>
                                                                    <th scope="col">Status</th>
                                                                    <th scope="col">Rating</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2112</a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/users/avatar-1.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                            </div>
                                                                            <div class="flex-grow-1">Alex Smith</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Clothes</td>
                                                                    <td>
                                                                        <span class="text-success">$109.00</span>
                                                                    </td>
                                                                    <td>Zoetic Fashion</td>
                                                                    <td>
                                                                        <span class="badge bg-success-subtle text-success">Paid</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 fw-medium mb-0">5.0<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                                    </td>
                                                                </tr><!-- end tr -->
                                                                <tr>
                                                                    <td>
                                                                        <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2111</a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                            </div>
                                                                            <div class="flex-grow-1">Jansh Brown</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Kitchen Storage</td>
                                                                    <td>
                                                                        <span class="text-success">$149.00</span>
                                                                    </td>
                                                                    <td>Micro Design</td>
                                                                    <td>
                                                                        <span class="badge bg-warning-subtle text-warning">Pending</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 fw-medium mb-0">4.5<span class="text-muted fs-11 ms-1">(61 votes)</span></h5>
                                                                    </td>
                                                                </tr><!-- end tr -->
                                                                <tr>
                                                                    <td>
                                                                        <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2109</a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                            </div>
                                                                            <div class="flex-grow-1">Ayaan Bowen</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Bike Accessories</td>
                                                                    <td>
                                                                        <span class="text-success">$215.00</span>
                                                                    </td>
                                                                    <td>Nesta Technologies</td>
                                                                    <td>
                                                                        <span class="badge bg-success-subtle text-success">Paid</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 fw-medium mb-0">4.9<span class="text-muted fs-11 ms-1">(89 votes)</span></h5>
                                                                    </td>
                                                                </tr><!-- end tr -->
                                                                <tr>
                                                                    <td>
                                                                        <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2108</a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/users/avatar-4.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                            </div>
                                                                            <div class="flex-grow-1">Prezy Mark</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Furniture</td>
                                                                    <td>
                                                                        <span class="text-success">$199.00</span>
                                                                    </td>
                                                                    <td>Syntyce Solutions</td>
                                                                    <td>
                                                                        <span class="badge bg-danger-subtle text-danger">Unpaid</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 fw-medium mb-0">4.3<span class="text-muted fs-11 ms-1">(47 votes)</span></h5>
                                                                    </td>
                                                                </tr><!-- end tr -->
                                                                <tr>
                                                                    <td>
                                                                        <a href="apps-ecommerce-order-details.html" class="fw-medium link-primary">#VZ2107</a>
                                                                    </td>
                                                                    <td>
                                                                        <div class="d-flex align-items-center">
                                                                            <div class="flex-shrink-0 me-2">
                                                                                <img src="assets/images/users/avatar-6.jpg" alt="" class="avatar-xs rounded-circle" />
                                                                            </div>
                                                                            <div class="flex-grow-1">Vihan Hudda</div>
                                                                        </div>
                                                                    </td>
                                                                    <td>Bags and Wallets</td>
                                                                    <td>
                                                                        <span class="text-success">$330.00</span>
                                                                    </td>
                                                                    <td>iTest Factory</td>
                                                                    <td>
                                                                        <span class="badge bg-success-subtle text-success">Paid</span>
                                                                    </td>
                                                                    <td>
                                                                        <h5 class="fs-14 fw-medium mb-0">4.7<span class="text-muted fs-11 ms-1">(161 votes)</span></h5>
                                                                    </td>
                                                                </tr><!-- end tr -->
                                                            </tbody><!-- end tbody -->
                                                        </table><!-- end table -->
                                                    </div>
                                                </div>
                                            </div> <!-- .card-->
                                        </div> <!-- .col-->
                                    </div> <!-- end row-->

                                </div> <!-- end .h-100-->

                            </div> <!-- end col -->

                            <div class="col-auto layout-rightside-col">
                                <div class="overlay"></div>
                                <div class="layout-rightside">
                                    <div class="card h-100 rounded-0">
                                        <div class="card-body p-0">
                                            <div class="p-3">
                                                <h6 class="text-muted mb-0 text-uppercase fw-semibold">Recent Activity</h6>
                                            </div>
                                            <div data-simplebar style="max-height: 410px;" class="p-3 pt-0">
                                                <div class="acitivity-timeline acitivity-main">
                                                    <div class="acitivity-item d-flex">
                                                        <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                            <div class="avatar-title bg-success-subtle text-success rounded-circle">
                                                                <i class="ri-shopping-cart-2-line"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Purchase by James Price</h6>
                                                            <p class="text-muted mb-1">Product noise evolve smartwatch </p>
                                                            <small class="mb-0 text-muted">02:14 PM Today</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0 avatar-xs acitivity-avatar">
                                                            <div class="avatar-title bg-danger-subtle text-danger rounded-circle">
                                                                <i class="ri-stack-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Added new <span class="fw-semibold">style collection</span></h6>
                                                            <p class="text-muted mb-1">By Nesta Technologies</p>
                                                            <div class="d-inline-flex gap-2 border border-dashed p-2 mb-2">
                                                                <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                                    <img src="assets/images/products/img-8.png" alt="" class="img-fluid d-block" />
                                                                </a>
                                                                <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                                    <img src="assets/images/products/img-2.png" alt="" class="img-fluid d-block" />
                                                                </a>
                                                                <a href="apps-ecommerce-product-details.html" class="bg-light rounded p-1">
                                                                    <img src="assets/images/products/img-10.png" alt="" class="img-fluid d-block" />
                                                                </a>
                                                            </div>
                                                            <p class="mb-0 text-muted"><small>9:47 PM Yesterday</small></p>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Natasha Carey have liked the products</h6>
                                                            <p class="text-muted mb-1">Allow users to like products in your WooCommerce store.</p>
                                                            <small class="mb-0 text-muted">25 Dec, 2021</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div class="avatar-title rounded-circle bg-secondary">
                                                                    <i class="mdi mdi-sale fs-14"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Today offers by <a href="apps-ecommerce-seller-details.html" class="link-secondary">Digitech Galaxy</a></h6>
                                                            <p class="text-muted mb-2">Offer is valid on orders of Rs.500 Or above for selected products only.</p>
                                                            <small class="mb-0 text-muted">12 Dec, 2021</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div class="avatar-title rounded-circle bg-danger-subtle text-danger">
                                                                    <i class="ri-bookmark-fill"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Favorite Product</h6>
                                                            <p class="text-muted mb-2">Esther James have Favorite product.</p>
                                                            <small class="mb-0 text-muted">25 Nov, 2021</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div class="avatar-title rounded-circle bg-secondary">
                                                                    <i class="mdi mdi-sale fs-14"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Flash sale starting <span class="text-primary">Tomorrow.</span></h6>
                                                            <p class="text-muted mb-0">Flash sale by <a href="javascript:void(0);" class="link-secondary fw-medium">Zoetic Fashion</a></p>
                                                            <small class="mb-0 text-muted">22 Oct, 2021</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item py-3 d-flex">
                                                        <div class="flex-shrink-0">
                                                            <div class="avatar-xs acitivity-avatar">
                                                                <div class="avatar-title rounded-circle bg-info-subtle text-info">
                                                                    <i class="ri-line-chart-line"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Monthly sales report</h6>
                                                            <p class="text-muted mb-2"><span class="text-danger">2 days left</span> notification to submit the monthly sales report. <a href="javascript:void(0);" class="link-warning text-decoration-underline">Reports Builder</a></p>
                                                            <small class="mb-0 text-muted">15 Oct</small>
                                                        </div>
                                                    </div>
                                                    <div class="acitivity-item d-flex">
                                                        <div class="flex-shrink-0">
                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-xs rounded-circle acitivity-avatar" />
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="mb-1 lh-base">Frank Hook Commented</h6>
                                                            <p class="text-muted mb-2 fst-italic">" A product that has reviews is more likable to be sold than a product. "</p>
                                                            <small class="mb-0 text-muted">26 Aug, 2021</small>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-3 mt-2">
                                                <h6 class="text-muted mb-3 text-uppercase fw-semibold">Top 10 Categories
                                                </h6>

                                                <ol class="ps-3 text-muted">
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Mobile & Accessories <span class="float-end">(10,294)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Desktop <span class="float-end">(6,256)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Electronics <span class="float-end">(3,479)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Home & Furniture <span class="float-end">(2,275)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Grocery <span class="float-end">(1,950)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Fashion <span class="float-end">(1,582)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Appliances <span class="float-end">(1,037)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Beauty, Toys & More <span class="float-end">(924)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Food & Drinks <span class="float-end">(701)</span></a>
                                                    </li>
                                                    <li class="py-1">
                                                        <a href="#" class="text-muted">Toys & Games <span class="float-end">(239)</span></a>
                                                    </li>
                                                </ol>
                                                <div class="mt-3 text-center">
                                                    <a href="javascript:void(0);" class="text-muted text-decoration-underline">View all Categories</a>
                                                </div>
                                            </div>
                                            <div class="p-3">
                                                <h6 class="text-muted mb-3 text-uppercase fw-semibold">Products Reviews</h6>
                                                <!-- Swiper -->
                                                <div class="swiper vertical-swiper" style="height: 250px;">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="card border border-dashed shadow-none">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-shrink-0 avatar-sm">
                                                                            <div class="avatar-title bg-light rounded">
                                                                                <img src="assets/images/companies/img-1.png" alt="" height="30">
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-3">
                                                                            <div>
                                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines"> " Great product and looks great, lots of features. "</p>
                                                                                <div
                                                                                    class="fs-11 align-middle text-warning">
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-end mb-0 text-muted">
                                                                                - by <cite title="Source Title">Force Medicines</cite>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="card border border-dashed shadow-none">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-3.jpg" alt="" class="avatar-sm rounded">
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-3">
                                                                            <div>
                                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines"> " Amazing template, very easy to understand and manipulate. "</p>
                                                                                <div class="fs-11 align-middle text-warning">
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-half-fill"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-end mb-0 text-muted">
                                                                                - by <cite title="Source Title">Henry Baird</cite>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="card border border-dashed shadow-none">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-shrink-0 avatar-sm">
                                                                            <div class="avatar-title bg-light rounded">
                                                                                <img src="assets/images/companies/img-8.png" alt="" height="30">
                                                                            </div>
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-3">
                                                                            <div>
                                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines"> "Very beautiful product and Very helpful customer service."</p>
                                                                                <div class="fs-11 align-middle text-warning">
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-line"></i>
                                                                                    <i class="ri-star-line"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-end mb-0 text-muted">
                                                                                - by <cite title="Source Title">Zoetic Fashion</cite>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="card border border-dashed shadow-none">
                                                                <div class="card-body">
                                                                    <div class="d-flex">
                                                                        <div class="flex-shrink-0">
                                                                            <img src="assets/images/users/avatar-2.jpg" alt="" class="avatar-sm rounded">
                                                                        </div>
                                                                        <div class="flex-grow-1 ms-3">
                                                                            <div>
                                                                                <p class="text-muted mb-1 fst-italic text-truncate-two-lines">" The product is very beautiful. I like it. "</p>
                                                                                <div class="fs-11 align-middle text-warning">
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-fill"></i>
                                                                                    <i class="ri-star-half-fill"></i>
                                                                                    <i class="ri-star-line"></i>
                                                                                </div>
                                                                            </div>
                                                                            <div class="text-end mb-0 text-muted">
                                                                                - by <cite title="Source Title">Nancy Martino</cite>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="p-3">
                                                <h6 class="text-muted mb-3 text-uppercase fw-semibold">Customer Reviews</h6>
                                                <div class="bg-light px-3 py-2 rounded-2 mb-2">
                                                    <div class="d-flex align-items-center">
                                                        <div class="flex-grow-1">
                                                            <div class="fs-16 align-middle text-warning">
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-fill"></i>
                                                                <i class="ri-star-half-fill"></i>
                                                            </div>
                                                        </div>
                                                        <div class="flex-shrink-0">
                                                            <h6 class="mb-0">4.5 out of 5</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="text-center">
                                                    <div class="text-muted">Total <span class="fw-medium">5.50k</span> reviews</div>
                                                </div>

                                                <div class="mt-3">
                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0">5 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-1">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 50.16%" aria-valuenow="50.16" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0 text-muted">2758</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0">4 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-1">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 29.32%" aria-valuenow="29.32" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0 text-muted">1063</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0">3 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-1">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 18.12%" aria-valuenow="18.12" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0 text-muted">997</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0">2 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-1">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 4.98%" aria-valuenow="4.98" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0 text-muted">227</h6>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- end row -->

                                                    <div class="row align-items-center g-2">
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0">1 star</h6>
                                                            </div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="p-1">
                                                                <div class="progress animated-progress progress-sm">
                                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 7.42%" aria-valuenow="7.42" aria-valuemin="0" aria-valuemax="100"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-auto">
                                                            <div class="p-1">
                                                                <h6 class="mb-0 text-muted">408</h6>
                                                            </div>
                                                        </div>
                                                    </div><!-- end row -->
                                                </div>
                                            </div>

                                            <div class="card sidebar-alert bg-light border-0 text-center mx-4 mb-0 mt-3">
                                                <div class="card-body">
                                                    <img src="assets/images/giftbox.png" alt="">
                                                    <div class="mt-4">
                                                        <h5>Invite New Seller</h5>
                                                        <p class="text-muted lh-base">Refer a new seller to us and earn $100 per refer.</p>
                                                        <button type="button" class="btn btn-primary btn-label rounded-pill"><i class="ri-mail-fill label-icon align-middle rounded-pill fs-16 me-2"></i> Invite Now</button>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div> <!-- end card-->
                                </div> <!-- end .rightbar-->

                            </div> <!-- end col -->
                        </div>

                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Velzon.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-end d-none d-sm-block">
                                    Design & Develop by Themesbrand
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->



        <!--start back-to-top-->
        <button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
            <i class="ri-arrow-up-line"></i>
        </button>
        <!--end back-to-top-->

        <!--preloader-->
        <div id="preloader">
            <div id="status">
                <div class="spinner-border text-primary avatar-sm" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
        </div>

        <!-- JAVASCRIPT -->
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>
        <script src="assets/libs/feather-icons/feather.min.js"></script>
        <script src="assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
        <script src="assets/js/plugins.js"></script>

        <!-- apexcharts -->
        <script src="assets/libs/apexcharts/apexcharts.min.js"></script>

        <!-- Vector map-->
        <script src="assets/libs/jsvectormap/js/jsvectormap.min.js"></script>
        <script src="assets/libs/jsvectormap/maps/world-merc.js"></script>

        <!--Swiper slider js-->
        <script src="assets/libs/swiper/swiper-bundle.min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/js/pages/dashboard-ecommerce.init.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
    </body>

    </html>
