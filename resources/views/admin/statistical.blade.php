@extends('admin.layouts.master')

@section('title')
    dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-xl-4 col-md-3">
            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Tổng thu theo ngày</p>
                        </div>
                        <div class="flex-shrink-0">
                            <form id="single-date-form">
                                @csrf
                                <input type="date" class="form-control" name="single_date" id="single_date" required
                                    onchange="fetchSingleDateStatistics()">
                            </form>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span id="totalAmountSingleDate">0</span>
                            </h4>
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

            <!-- card -->
            {{-- <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Tổng đơn hàng</p>
                        </div>
                        <div class="flex-shrink-0">
                            <form id="statistics-form">
                                @csrf
                                <input type="date" class="form-control" name="date" id="date" required>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                    id="totalOrders">0</span></h4>
                            <a href="" class="text-decoration-underline">View all orders</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-info-subtle rounded fs-3">
                                <i class="bx bx-shopping-bag text-info"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card --> --}}

            <!-- card -->
            {{-- <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0">Khách hàng</p>
                        </div>
                        <div class="flex-shrink-0">
                            <form id="customer-statistics-form">
                                @csrf
                                <input type="date" class="form-control" name="date" id="date-customer" required>
                            </form>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span class="counter-value"
                                    id="totalCustomers">0</span> </h4>
                            <a href="" class="text-decoration-underline">See details</a>
                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                <i class="bx bx-user-circle text-warning"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card --> --}}

            <!-- card -->
            <div class="card card-animate">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 overflow-hidden">
                            <p class="text-uppercase fw-medium text-muted text-truncate mb-0"> Tổng thu nhập khoảng ngày</p>
                        </div>
                        <div class="flex-shrink-0">
                            <form id="date-range-form">
                                @csrf
                                <label for="start_date">Start Date:</label>
                                <input type="date" class="form-control" name="start_date" id="start_date" required
                                    onchange="fetchDateRangeStatistics()">

                                <label for="end_date">End Date:</label>
                                <input type="date" class="form-control" name="end_date" id="end_date" required
                                    onchange="fetchDateRangeStatistics()">
                            </form>
                        </div>
                    </div>
                    <div class="d-flex align-items-end justify-content-between mt-4">
                        <div>
                            <h4 class="fs-22 fw-semibold ff-secondary mb-4"><span id="totalAmountDateRange">0</span></h4>

                        </div>
                        <div class="avatar-sm flex-shrink-0">
                            <span class="avatar-title bg-warning-subtle rounded fs-3">
                                <i class="bx bx-dollar-circle text-warning"></i>
                            </span>
                        </div>
                    </div>
                </div><!-- end card body -->
            </div><!-- end card -->
        </div><!-- end col -->

        <div class="col-xl-8">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">những đơn đặt hàng gần đây</h4>
                </div><!-- end card header -->
                <div class="card-header align-items-center d-flex">
                    <form id="filter-form">
                        @csrf
                        <label for="status_id">Status:</label>
                        <select name="status_id" id="status_id">
                            <option value="">Select Status</option>
                            <option value="1">Chờ xác nhận</option>
                            <option value="2">Chờ lấy hàng</option>
                            <option value="3">Đang giao</option>
                            <option value="4">Đã giao</option>
                            <option value="5">Đã hủy</option>
                            <option value="6">Trả hàng</option>
                        </select>

                        <label for="payment_id">Payment Method:</label>
                        <select name="payment_id" id="payment_id">
                            <option value="">Select Payment Method</option>
                            <option value="1">Chưa thanh toán</option>
                            <option value="2">Đã thanh toán</option>
                        </select>
                    </form>
                </div>

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table id="example1"
                            class="table table-borderless table-centered align-middle table-nowrap mb-0">
                            <thead class="text-muted table-info">
                                <tr>
                                    <th scope="col">Total Amount</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Rows will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- .col-->

        </div><!-- end col -->
    </div> <!-- end row-->
    <div class="row">
        <div class="col">
            <div class="h-100">
                <div class="row">

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
                                            <h5 class="mb-1"><span class="counter-value"
                                                    data-target="{{ $data->earn }}">0</span>đ</h5>
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
            </div> <!-- end .h-100-->
        </div> <!-- end col -->
    </div>
@endsection

@section('style-libs')
    <!-- jsvectormap css -->
    <link href="{{ asset('theme/admin/assets/libs/jsvectormap/css/jsvectormap.min.css') }}" rel="stylesheet"
        type="text/css" />

    <!--Swiper slider css-->
    <link href="{{ asset('theme/admin/assets/libs/swiper/swiper-bundle.min.css') }}" rel="stylesheet" type="text/css" />


    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />

    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
@endsection

@section('script-libs')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

    {{-- <script>
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ],
            searching: false,
            pageLength: 5,
            lengthChange: false
        });
    </script>
    <script>
        new DataTable("#example1", {
            order: [
                [0, 'desc']
            ],
            searching: false,
            pageLength: 5,
            lengthChange: false
        });
    </script> --}}

    <!-- TotalAmount -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set the default date to today for single date selection
            var today = new Date().toISOString().substr(0, 10);
            document.getElementById('single_date').value = today;

            // Set the default date to today for date range selection
            document.getElementById('start_date').value = today;
            document.getElementById('end_date').value = today;


            // Fetch statistics for the default date and date range
            fetchSingleDateStatistics();
            fetchDateRangeStatistics();
        });

        function fetchSingleDateStatistics() {
            var date = document.getElementById('single_date').value;

            $.ajax({
                url: '{{ route('orders.single_date_statistics') }}',
                method: 'GET',
                data: {
                    date: date
                },
                success: function(response) {
                    var formatter = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 2
                    });

                    $('#totalAmountSingleDate').text(formatter.format(response.totalAmount));
                }
            });
        }

        function fetchDateRangeStatistics() {
            var start_date = document.getElementById('start_date').value;
            var end_date = document.getElementById('end_date').value;

            $.ajax({
                url: '{{ route('orders.date_range_statistics') }}',
                method: 'GET',
                data: {
                    start_date: start_date,
                    end_date: end_date
                },
                success: function(response) {
                    var formatter = new Intl.NumberFormat('vi-VN', {
                        style: 'currency',
                        currency: 'VND',
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 2
                    });
                    $('#totalAmountDateRange').text(formatter.format(response.totalAmount));
                }
            });
        }
    </script>
    <script>
        // $(document).ready(function() {
        //     var table = $('#example1').DataTable({
        //         order: [
        //             [0, 'desc']
        //         ],
        //         searching: false,
        //         pageLength: 5,
        //         lengthChange: false
        //     });

        //     $('#status_id, #payment_id').on('change', function() {
        //         fetchOrders();
        //     });

        //     function fetchOrders() {
        //         var status_id = $('#status_id').val();
        //         var payment_id = $('#payment_id').val();

        //         $.ajax({
        //             url: '{{ route('orders.filter') }}',
        //             method: 'GET',
        //             data: {
        //                 status_id: status_id,
        //                 payment_id: payment_id
        //             },
        //             success: function(response) {
        //                 var tbody = $('#example1 tbody');
        //                 tbody.empty();

        //                 response.forEach(function(order) {
        //                     tbody.append(
        //                         '<tr>' +
        //                         '<td>' + order.total_amount + '</td>' +
        //                         '<td>' + order.name + '</td>' +
        //                         '<td>' + order.address + '</td>' +
        //                         '<td>' + order.phone + '</td>' +
        //                         '<td>' + order.email + '</td>' +
        //                         '</tr>'
        //                     );
        //                 });

        //                 // Tái khởi tạo DataTables sau khi cập nhật dữ liệu
        //                 table.clear().rows.add(tbody.find('tr')).draw();
        //             },
        //             error: function() {
        //                 alert('Failed to load orders.');
        //             }
        //         });
        //     }

        //     // Fetch orders initially on page load
        //     fetchOrders();
        // });
        $(document).ready(function() {
    var table = $('#example1').DataTable({
        order: [
            [0, 'desc']
        ],
        searching: false,
        pageLength: 5,
        lengthChange: false
    });

    $('#status_id, #payment_id').on('change', function() {
        fetchOrders();
    });

    function fetchOrders() {
        var status_id = $('#status_id').val();
        var payment_id = $('#payment_id').val();

        $.ajax({
            url: '{{ route('orders.filter') }}',
            method: 'GET',
            data: {
                status_id: status_id,
                payment_id: payment_id
            },
            success: function(response) {
                var tbody = $('#example1 tbody');
                tbody.empty();

                response.forEach(function(order) {
                    // Format total_amount using toLocaleString
                    var formattedAmount = parseFloat(order.total_amount).toLocaleString('vi-VN', {
                        minimumFractionDigits: 0,
                        maximumFractionDigits: 0
                    });

                    tbody.append(
                        '<tr>' +
                        '<td>' + formattedAmount + 'đ' + '</td>' +
                        '<td>' + order.name + '</td>' +
                        '<td>' + order.address + '</td>' +
                        '<td>' + order.phone + '</td>' +
                        '<td>' + order.email + '</td>' +
                        '</tr>'
                    );
                });

                // Reinitialize DataTables after updating data
                table.clear().rows.add(tbody.find('tr')).draw();
            },
            error: function() {
                alert('Failed to load orders.');
            }
        });
    }

    // Fetch orders initially on page load
    fetchOrders();
});

    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set the default date to today
            var today = new Date().toISOString().substr(0, 10);
            document.getElementById('date').value = today;

            // Fetch statistics for the default date
            fetchStatistics(today);

            document.getElementById('date').addEventListener('change', function() {
                var selectedDate = this.value;
                fetchStatistics(selectedDate);
            });

            document.getElementById('statistics-form').addEventListener('submit', function(e) {
                e.preventDefault();
                var selectedDate = document.getElementById('date').value;
                fetchStatistics(selectedDate);
            });

            function fetchStatistics(date) {
                $.ajax({
                    url: '{{ route('orders.statistics') }}',
                    method: 'GET',
                    data: {
                        date: date
                    },
                    success: function(response) {
                        $('#totalOrders').text(response.totalOrders);
                    }
                });
            }
        });
    </script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Set the default date to today
            var today = new Date().toISOString().substr(0, 10);
            document.getElementById('date-customer').value = today;

            // Fetch statistics for the default date
            fetchCustomerStatistics(today);

            document.getElementById('date-customer').addEventListener('change', function() {
                var selectedDate = this.value;
                fetchCustomerStatistics(selectedDate);
            });

            document.getElementById('customer-statistics-form').addEventListener('submit', function(e) {
                e.preventDefault();
                var selectedDate = document.getElementById('date-customer').value;
                fetchCustomerStatistics(selectedDate);
            });

            function fetchCustomerStatistics(date) {
                $.ajax({
                    url: '{{ route('orders.customer_statistics') }}',
                    method: 'GET',
                    data: {
                        date: date
                    },
                    success: function(response) {
                        $('#totalCustomers').text(response.totalCustomers);
                    }
                });
            }
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
