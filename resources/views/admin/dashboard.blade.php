@extends('admin.layouts.master')

@section('title')
    Dashboard
@endsection

@section('content')
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
                                                <input type="text"
                                                    class="form-control border-0 dash-filter-picker shadow"
                                                    data-provider="flatpickr" data-range-date="true"
                                                    data-date-format="d M, Y"
                                                    data-deafult-date="01 Jan 2022 to 31 Jan 2022">
                                                <div class="input-group-text bg-primary border-primary text-white">
                                                    <i class="ri-calendar-2-line"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto">
                                            <button type="button" class="btn btn-soft-success"><i
                                                    class="ri-add-circle-line align-middle me-1"></i> Add Product</button>
                                        </div>
                                        <!--end col-->
                                        <div class="col-auto">
                                            <button type="button"
                                                class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i
                                                    class="ri-pulse-line"></i></button>
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
                    <div class="col-xl-6 col-md-6">
                        <!-- card -->
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1 overflow-hidden">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Tổng thu phập
                                            trong ngày</p>
                                    </div>
                                    <div class="flex-shrink-0">
                                        <h5 class="text-success fs-14 mb-0">
                                            <i class="ri-arrow-right-up-line fs-13 align-middle"></i> +16.24 %
                                        </h5>
                                    </div>
                                </div>
                                <div class="d-flex align-items-end justify-content-between mt-4">
                                    <div>
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4">$<span class="counter-value"
                                                data-target={{ $data->dayAmount }}>0</span>k </h4>
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
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target={{ $data->dayOrder }}>0</span></h4>
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
                                        <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                                data-target={{ $data->customer }}>0</span> </h4>
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

                    </div><!-- end col -->
                </div> <!-- end row-->

                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Best Selling Products</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table id="example"
                                        class="table table-hover table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-info">
                                            <tr>
                                                <th>ID</th>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Orders</th>
                                                <th>Stock</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($results as $r)
                                                <tr>
                                                    <td><p class="fw-medium link-primary">#{{ $r->id }}</p></td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="avatar-sm bg-light rounded p-1 me-2">
                                                                <img src="{{ asset('uploads/' . $r->thumbnail) }}"
                                                                    alt="" class="img-fluid d-block" />
                                                            </div>
                                                            <div>
                                                                <h5 class="fs-14 my-1"><a

                                                                        class="text-reset">{{ $r->name_product }}
                                                                        ({{ $r->color }} {{ $r->size }})</a></h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{{ $r->price }}</td>
                                                    <td>{{ $r->total_quantity }}</td>
                                                    <td>{{ $r->quantity }}</td>
                                                    <td>{{ $r->quantity * $r->price }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Recent Orders</h4>
                            </div><!-- end card header -->

                            <div class="card-body">
                                <div class="table-responsive table-card">
                                    <table id="example1"
                                        class="table table-borderless table-centered align-middle table-nowrap mb-0">
                                        <thead class="text-muted table-info">
                                            <tr>
                                                <th scope="col">Order ID</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">Status</th>
                                                <th scope="col">Payment</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($topOrders as $to)
                                                <tr>
                                                    <td>
                                                        <p class="fw-medium link-primary">#{{ $to->id }}</p>
                                                    </td>
                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <div class="flex-grow-1">{{ $to->name }}</div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <span class="text">{{ $to->total_amount }}</span>
                                                    </td>
                                                    @php
                                                        $statusClass = '';
                                                        switch ($to->status_name) {
                                                            case 'Chờ xác nhận':
                                                                $statusClass = 'bg-warning-subtle text-warning';
                                                                break;
                                                            case 'Chờ lấy hàng':
                                                                $statusClass = 'bg-warning-subtle text-warning';
                                                                break;
                                                            case 'Đang giao':
                                                                $statusClass = 'bg-info-subtle text-info';
                                                                break;
                                                            case 'Đã giao':
                                                                $statusClass = 'bg-success-subtle text-success';
                                                                break;
                                                            case 'Đã hủy':
                                                                $statusClass = 'bg-danger-subtle text-danger';
                                                                break;
                                                            case 'Trả hàng':
                                                                $statusClass = 'bg-danger-subtle text-danger';
                                                                break;
                                                            default:
                                                                $statusClass = 'bg-success-subtle text-success';
                                                                break;
                                                        }
                                                    @endphp
                                                    <td>
                                                        <span
                                                            class="badge {{ $statusClass }}">{{ $to->status_name }}</span>
                                                    </td>
                                                    @php
                                                        $paymentClass = '';
                                                        switch ($to->payment_name) {
                                                            case 'Chưa thanh toán':
                                                                $paymentClass = 'bg-warning-subtle text-warning';
                                                                break;
                                                            case 'Đã thanh toán':
                                                                $paymentClass = 'bg-success-subtle text-success';
                                                                break;
                                                            default:
                                                                $paymentClass = 'bg-warning-subtle text-warning';
                                                                break;
                                                        }
                                                    @endphp
                                                    <td>
                                                        <span
                                                            class="badge {{ $paymentClass }}">{{ $to->payment_name }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div> <!-- .card-->
                    </div> <!-- .col-->
                </div> <!-- end row-->
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-header p-0 border-0 bg-info-subtle">
                                <div class="row g-0 text-center">
                                    <div class="col-6 col-sm-4">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span class="counter-value"
                                                    data-target={{ $data->amount }}>0</span></h5>
                                            <p class="text-muted mb-0">Đơn hàng</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-4">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1">$<span class="counter-value"
                                                    data-target="{{ $data->earn }}">0</span>k</h5>
                                            <p class="text-muted mb-0">Thu nhập</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                    <div class="col-6 col-sm-4">
                                        <div class="p-3 border border-dashed border-start-0">
                                            <h5 class="mb-1"><span class="counter-value"
                                                    data-target={{ $data->refund }}></span></h5>
                                            <p class="text-muted mb-0">Hoàn tiền</p>
                                        </div>
                                    </div>
                                    <!--end col-->
                                </div>
                            </div><!-- end card header -->

                            <div class="card-body p-0 pb-2">
                                <div class="w-100">
                                    <div id="data_charts" data-orders={{ collect($data->orders)->implode('-') }}
                                        data-earns={{ collect($data->earns)->implode('-') }}
                                        data-refunds={{ collect($data->refunds)->implode('-') }}></div>
                                    <div id="customer_impression_charts"
                                        data-colors='["--vz-primary", "--vz-success", "--vz-danger"]' class="apex-charts"
                                        dir="ltr"></div>
                                </div>
                            </div><!-- end card body -->
                        </div><!-- end card -->
                    </div><!-- end col -->


                </div> <!-- end .h-100-->

            </div> <!-- end col -->
        </div>
    @endsection

    @section('style-libs')
        <!-- jsvectormap css -->
        <link href="{{ asset('theme/admin/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
            type="text/css" />

        <!--Swiper slider css-->
        <link href="{{ asset('theme/admin/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet"
            type="text/css" />


        <!--datatable css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
        <!--datatable responsive css-->
        <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    @endsection

    @section('script-libs')
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <!--datatable js-->
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

        <script>
            new DataTable("#example", {
                order: [
                    [0, 'desc']
                ],
                searching: false,
                pageLength: 5, // Mặc định số lượng dòng hiển thị là 5
                lengthChange: false // Ẩn ô "show entries"
            });
        </script>
        <script>
            new DataTable("#example1", {
                order: [
                    [0, 'desc']
                ],
                searching: false,
                pageLength: 5, // Mặc định số lượng dòng hiển thị là 5
                lengthChange: false // Ẩn ô "show entries"
            });
        </script>

        {{-- inform order --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                var hasShownNotification = false; // Biến flag để kiểm tra đã hiển thị thông báo hay chưa

                // Hàm kiểm tra đơn hàng mới
                function checkNewOrder() {
                    $.ajax({
                        url: '{{ route('check-new-order') }}', // Sử dụng route đã định nghĩa
                        method: 'GET',
                        success: function(response) {
                            if (response.newOrderCount > 0 && !hasShownNotification) {
                                // Cập nhật nội dung thông báo và hiển thị nó
                                $('#notification').text('Bạn có ' + response.newOrderCount + ' đơn hàng mới!').show();
                                hasShownNotification = true; // Đánh dấu đã hiển thị thông báo
                            }
                            if (response.hasNewOrders && !hasShownNotification) {
                                // Tạo nội dung thông báo
                                var notificationContent = '<ul>';
                                response.newOrders.forEach(function(order) {
                                    notificationContent += 'Đơn hàng #' + order.id + ' - Tổng số tiền: ' + order.total_amount;
                                });

                                // Cập nhật nội dung thông báo và hiển thị nó
                                $('#textNotification').text(notificationContent).show();
                                hasShownNotification = true; // Đánh dấu đã hiển thị thông báo
                            }
                        },
                        error: function(err) {
                            console.error('Lỗi khi kiểm tra đơn hàng mới:', err);
                        }
                    });
                }

                // Kiểm tra đơn hàng mới khi tải trang lần đầu
                checkNewOrder();

                // Sau đó kiểm tra đơn hàng mới mỗi 30 giây
                //setInterval(checkNewOrder, 30000); // Mỗi 30 giây
            });
        </script>


        <!-- apexcharts -->
        <script src="{{ asset('theme/admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

        <!-- Vector map-->
        <script src="{{ asset('theme/admin/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
        <script src="{{ asset('theme/admin/assets/libs/jsvectormap/maps/world-merc.js') }}"></script>

        <!--Swiper slider js-->
        <script src="{{ asset('theme/admin/assets/libs/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Dashboard init -->
        <script src="{{ asset('theme/admin/assets/js/pages/dashboard-ecommerce.init.js') }}"></script>
    @endsection
