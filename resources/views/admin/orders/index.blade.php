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
                    <table id="example"
                           class="table table-bordered dt-responsive nowrap table-striped align-middle"
                           style="width:100%">

                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>ID User</th>
                            <th>Name Client</th>
                            <th>Address</th>
                            <th>Phone Number</th>
                            <th>Total Amount</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Voucher ID</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $od)
                                <tr>
                                    <td>{{ $od->id }}</td>
                                    <td>{{ $od->user_id }}</td>
                                    <td>{{ $od->name }}</td>
                                    <td>{{ $od->address }}</td>
                                    <td>{{ $od->phone }}</td>
                                    <td>{{ $od->total_amount }}</td>
                                    <td>
                                        @php
                                            if($od->status == 0){
                                                echo 'Đang giao hàng';
                                            } else if($od->status == 1){
                                                echo 'Giao hàng thành công';
                                            } else if($od->status == 2){
                                                echo 'Giao hàng thất bại';
                                            } else if($od->status == 3){
                                                echo 'Đã hủy';
                                            } else{
                                                echo 'NULL';
                                            }
                                        @endphp
                                    </td>
                                    <td>
                                        @php
                                            if($od->payment == 0){
                                                echo 'Đã thanh toán';
                                            } else if($od->payment == 1){
                                                echo 'Chưa thanh toán';
                                            } else{
                                                echo 'NULL';
                                            }
                                        @endphp
                                    </td>
                                    <td>{{ $od->voucher_id }}</td>
                                    <td>
                                        <a href="{{ route('order-item',$od->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View Products</a>
                                        <a href="javascript:void(0);" class="dropdown-item edit-item-btn"
                                                        data-id="{{ $od->id }}" data-name="{{ $od->status }}"
                                                        data-payment="{{ $od->payment }}">
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
        <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="editItemForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-header">
                        <h5 class="modal-title" id="editItemModalLabel">Chỉnh sửa Trạng thái</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editOrderId" name="id">
                        <div class="mb-3">
                            <label for="editCatalogueCategory" class="form-label">Status</label>
                            <select class="form-select" id="editOrderStatus" name="status"
                                required>
                                    <option value="0">Đang giao hàng</option>
                                    <option value="1">Giao hàng thành công</option>
                                    <option value="2">Giao hàng thất bại</option>
                                    <option value="3">Đã hủy</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="editCatalogueCategory" class="form-label">Payment</label>
                            <select class="form-select" id="editOrderPayment" name="payment"
                                required>
                                    <option value="0">Đã Thanh Toán</option>
                                    <option value="1">Chưa thanh toán</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('style-libs')
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css"/>
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css"/>

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
            order: [ [0, 'desc'] ] }
        );
    </script>

<script>
    $(document).ready(function() {

        $('.edit-item-btn').on('click', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');
            let payment = $(this).data('payment');

            $('#editOrderId').val(id);
            $('#editOrderStatus').val(status);
            $('#editOrderPayment').val(payment);
            $('#editItemForm').attr('action', 'edit-order/' + id); // Adjust the URL as needed
            $('#editItemModal').modal('show');
        });

        $('#editItemForm').on('submit', function(e) {
            e.preventDefault();

            let formData = $(this).serialize();

            $.ajax({
                type: 'POST',
                url: $(this).attr('action'),
                data: formData,
                success: function(response) {
                    if (response.success) {
                        $('#editItemModal').modal('hide');
                        location.reload(); // Reload the page to reflect updated data
                    } else {
                        alert('An error occurred');
                    }
                },
                error: function(response) {
                    console.log(response.responseText); // Print error response
                    alert('An error occurred');
                }
            });
        });
    });
</script>
@endsection
