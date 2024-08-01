@extends('admin.layouts.master')

@section('title')
    Danh sách Hóa đơn
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Hóa đơn</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Danh sách Hóa đơn</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Danh sách</h5>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">

                        <thead>
                            <tr>

                                <th>ID</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Phone Number</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $od)
                                <tr>
                                    <td>{{ $od->id }}</td>
                                    <td>{{ $od->name }}</td>
                                    <td>{{ $od->address }}</td>
                                    <td>{{ $od->phone }}</td>
                                    <td>{{ $od->total_amount }}</td>
                                    @php
                                        $statusClass = '';
                                        switch ($od->status->name) {
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
                                        <span class="badge {{ $statusClass }}">{{ $od->status->name }}</span>
                                    </td>
                                    @php
                                        $paymentClass = '';
                                        switch ($od->payment->name) {
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
                                        <span class="badge {{ $paymentClass }}">{{ $od->payment->name }}</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('order-item', $od->id) }}" class="dropdown-item"><i
                                                class="ri-eye-fill align-bottom me-2 text-muted"></i> View Products</a>
                                        <a href="javascript:void(0);" class="dropdown-item edit-item-btn"
                                            data-id="{{ $od->id }}" data-status="{{ $od->status->id }}"
                                            data-payment="{{ $od->payment->id }}">
                                            <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit
                                        </a>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div><!--end col-->
    </div>

    <!-- Edit Item Modal Pop up-->
    <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editItemForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editItemModalLabel">Chỉnh sửa Trạng thái</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editOrderId" name="id">

                        <div class="mb-3">
                            <label for="editOrderStatus" class="form-label">Status</label>
                            <select class="form-select" id="editOrderStatus" name="status_id" required>
                                @foreach ($status as $st)
                                    <option value="{{ $st->id }}">{{ $st->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="editOrderPayment" class="form-label">Payment</label>
                            <select class="form-select" id="editOrderPayment" name="payment_id" required>
                                @foreach ($payment as $pm)
                                    <option value="{{ $pm->id }}">{{ $pm->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('style-libs')
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
        // Truyền danh sách trạng thái từ PHP vào JavaScript
        const statusOrder = @json($status->pluck('name'));

        $(document).ready(function() {
            $('.edit-item-btn').on('click', function() {
                let id = $(this).data('id');
                let statusId = $(this).data('status');
                let paymentId = $(this).data('payment');

                $('#editOrderId').val(id);
                $('#editOrderStatus').val(statusId);
                $('#editOrderPayment').val(paymentId);
                $('#editItemForm').attr('action', 'edit-order/' + id);

                // Lấy tên trạng thái hiện tại từ ID
                let currentStatus = statusOrder[statusId - 1];

                // Disable previous status options
                $('#editOrderStatus option').each(function() {
                    let optionText = $(this).text();
                    if (statusOrder.indexOf(optionText) < statusOrder.indexOf(currentStatus)) {
                        $(this).prop('disabled', true);
                    } else {
                        $(this).prop('disabled', false);
                    }
                });

                if (paymentId == 2) {
                    $('#editOrderPayment').prop('disabled', true);
                } else {
                    $('#editOrderPayment').prop('disabled', false);
                }

                $('#editItemModal').modal('show');
            });

            $('#editItemForm').on('submit', function(e) {
                e.preventDefault();

                // Enable all status options before submit
                $('#editOrderStatus option').prop('disabled', false);

                let formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#editItemModal').modal('hide');
                            location.reload();
                        } else {
                            alert('An error occurred');
                        }
                    },
                    error: function(response) {
                        console.log(response.responseText);
                        alert('An error occurred');
                    }
                });
            });
        });
    </script>
@endsection
