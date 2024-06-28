@extends('admin.layouts.master')

@section('title')
    Danh sách Vouchers
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Vouchers</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Danh sách Vouchers</li>
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

                    <a href="{{ route('admin.vouchers.create') }}" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="vouchers-table"
                           class="table table-bordered dt-responsive nowrap table-striped align-middle"
                           style="width:100%">
                           <thead>
                            <tr>
                                <th>Id</th>
                                <th>Code</th>
                                <th>Discount Type</th>
                                <th>Discount Value</th>
                                <th>Expiry Date</th>
                                <th>Min Purchase Amount</th>
                                <th>Category</th>
                                <th>Applicable Products</th>
                                <th>Max Usage</th>
                                <th>Used Count</th>
                                <th>Created Count</th>
                                <th>Remaining Count</th>
                                <th>Distribution Channels</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vouchers as $voucher)
                                <tr>
                                    <td>{{ $voucher->id }}</td>
                                    <td>{{ $voucher->code }}</td>
                                    <td>{{ $voucher->discount_type }}</td>
                                    <td>{{ $voucher->discount_value }}</td>
                                    <td>{{ $voucher->expiry_date }}</td>
                                    <td>{{ $voucher->min_purchase_amount }}</td>
                                    <td>{{ $voucher->category->name }}</td>
                                    <td>{{ $voucher->applicable_products }}</td>
                                    <td>{{ $voucher->max_usage }}</td>
                                    <td>{{ $voucher->used_count }}</td>
                                    <td>{{ $voucher->created_count }}</td>
                                    <td>{{ $voucher->remaining_count }}</td>
                                    <td>{{ $voucher->distribution_channels }}</td>
                                    <td>
                                        <a href="{{ route('admin.vouchers.edit', $voucher->id) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('admin.vouchers.destroy', $voucher->id) }}" method="POST" style="display:inline"; onsubmit="return confirm('Bạn có chắc chắn muốn xóa Voucher này không?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        </table>
                    </div>
                </div>
            </div><!--end col-->
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
        new DataTable("#vouchers-table", {
            order: [ [0, 'desc'] ] }
        );
    </script>
@endsection
