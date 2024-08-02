<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ asset('theme/admin/assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('theme/admin/assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->
        <a href="" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ asset('theme-cli/img/logo.png') }}" alt="" height="30">
            </span>
            <span class="logo-lg">
                <img src="{{ asset('theme-cli/img/logo.png') }}" alt="" height="30">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">

            </div>

            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span data-key="t-menu">Menu</span></li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('dashboard') }}">
                        <i class="ri-dashboard-2-line"></i> <span data-key="t-dashboards">Dashboards</span>
                    </a>
                </li> <!-- end Dashboard Menu -->

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ url('statistic') }}">
                        <i class="ri-layout-3-line"></i> <span data-key="t-dashboards">Statistics</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="{{ route('order') }}">
                        <i class="ri-layout-3-line"></i> <span data-key="t-dashboards">Orders</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarProduct" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarProduct">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Sản phẩm</span>

                    </a>
                    <div class="collapse menu-dropdown" id="sidebarProduct">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('product') }}" class="nav-link" data-key="t-horizontal">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('color') }}" class="nav-link" data-key="t-horizontal">Color</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('size') }}" class="nav-link" data-key="t-horizontal">Size</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('catalogue') }}" class="nav-link"
                                    data-key="t-horizontal">Catalogues</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('category') }}" class="nav-link" data-key="t-horizontal">Category</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a href="{{ url('order') }}" class="nav-link" data-key="t-horizontal">Order</a>
                            </li> --}}
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarUser" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarUser">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Users</span>

                    </a>
                    <div class="collapse menu-dropdown" id="sidebarUser">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('admin.users.index') }}" class="nav-link"
                                    data-key="t-horizontal">Danh sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin.users.create') }}" class="nav-link"
                                    data-key="t-horizontal">Thêm mới</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarVoucher" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarVoucher">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Vouchers</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarVoucher">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('admin.vouchers.index') }}" class="nav-link"
                                    data-key="t-horizontal">Danh sách
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin.vouchers.create') }}" class="nav-link"
                                    data-key="t-horizontal">Thêm mới
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarComment" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarComment">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Comments</span>

                    </a>
                    <div class="collapse menu-dropdown" id="sidebarComment">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('admin.comments.index') }}" class="nav-link"
                                    data-key="t-horizontal">Danh
                                    sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin.comments.create') }}" class="nav-link"
                                    data-key="t-horizontal">Thêm
                                    mới</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarBlog" data-bs-toggle="collapse" role="button"
                        aria-expanded="false" aria-controls="sidebarBlog">
                        <i class="ri-layout-3-line"></i>
                        <span data-key="t-layouts">Blog</span>

                    </a>
                    <div class="collapse menu-dropdown" id="sidebarBlog">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ url('admin.blogs.index') }}" class="nav-link"
                                    data-key="t-horizontal">Danh
                                    sách</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('admin.blogs.create') }}" class="nav-link"
                                    data-key="t-horizontal">Thêm
                                    mới</a>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
