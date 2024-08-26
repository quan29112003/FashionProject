@extends('admin.layouts.master')

@section('title')
    Danh sách Kích thước
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách kích thước</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Danh sách kích thước</li>
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

                    {{-- <a href="{{ route('store-size') }}" class="btn btn-primary mb-3">Thêm mới</a> --}}
                    <a href="javascript:void(0);" class="btn btn-primary mb-3" data-bs-toggle="modal"
                        data-bs-target="#addNewItemModal">Thêm mới</a>
                </div>






                <!-- Add New Item Modal -->
                <div class="modal fade" id="addNewItemModal" tabindex="-1" aria-labelledby="addNewItemModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="addNewItemForm" method="POST" action="{{ route('store-size') }}">
                                @csrf
                                <div class="modal-header">
                                    <h5 class="modal-title" id="addNewItemModalLabel">Thêm mới Kích thước</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="sizeName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="sizeName" name="size" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>




                <!-- Edit Item Modal -->
                <div class="modal fade" id="editItemModal" tabindex="-1" aria-labelledby="editItemModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form id="editItemForm" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editItemModalLabel">Chỉnh sửa Kích thước</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" id="editSizeId" name="id">
                                    <div class="mb-3">
                                        <label for="editSizeName" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="editSizeName" name="size"
                                            required>
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




                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($size as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->size }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>{{ $item->updated_at }}</td>

                                    {{-- <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('edit-size',$item->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
                                        </ul>
                                    </div>
                                </td> --}}

                                    <td>
                                        <a href="javascript:void(0);" class="dropdown-item edit-item-btn"
                                                        data-id="{{ $item->id }}" data-name="{{ $item->size }}">
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
        new DataTable("#example", {
            order: [
                [0, 'desc']
            ]
        });
    </script>

    <script>
        $(document).ready(function() {
            $('#addNewItemForm').on('submit', function(e) {
                e.preventDefault();

                let formData = $(this).serialize();

                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: formData,
                    success: function(response) {
                        if (response.success) {
                            $('#addNewItemModal').modal('hide');
                            location
                        .reload(); // Reload the page to reflect new data, or you can append new data to the table directly
                        } else {
                            alert('An error occurred');
                        }
                    },
                    error: function(response) {
                        alert('Trùng tên size hoặc chưa viết in hoa');
                    }
                });
            });

            $('.edit-item-btn').on('click', function() {
                let id = $(this).data('id');
                let name = $(this).data('name');

                $('#editSizeId').val(id);
                $('#editSizeName').val(name);
                $('#editItemForm').attr('action', 'edit-size/' + id); // Adjust the URL as needed
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
                        alert('Trùng tên size hoặc chưa viết in hoa');
                    }
                });
            });
        });
    </script>
@endsection
