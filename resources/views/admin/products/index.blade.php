@extends('admin.layouts.master')



@section('title')
    Danh sách Sản phẩm
@endsection

@section('content')
    {{-- Hiện thông báo --}}
    <div id="toast-container" class="toast-container position-fixed top-0 end-0 p-3">
    </div>


    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Danh sách Sản phẩm</li>
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
                    <a href="{{ route('store-product') }}" class="btn btn-primary mb-3">Thêm mới</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered dt-responsive nowrap table-striped align-middle"
                        style="width:100%">

                        <thead>
                            <tr>
                                <th>
                                    <select id="filterName" hidden>
                                    </select>
                                </th>
                                <th>
                                    <select id="filterCategory" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        @foreach ($category as $ct)
                                            <option value="{{ $ct->name }}">{{ $ct->name }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th></th>
                                <th>
                                    <select id="filterActive" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </th>
                                <th>
                                    <select id="filterHotDeal" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </th>
                                <th>
                                    <select id="filterGoodDeal" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </th>
                                <th>
                                    <select id="filterShowHome" class="form-select form-select-sm">
                                        <option value="">All</option>
                                        <option value="YES">YES</option>
                                        <option value="NO">NO</option>
                                    </select>
                                </th>
                            </tr>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Thumbnail</th>
                                <th>Active</th>
                                <th>Hot Deal</th>
                                <th>Good Deal</th>
                                <th>Show Home</th>
                                <th>Views</th>
                                <th>Created at</th>
                                <th>Updated at</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name_product }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/' . $product->thumbnail) }}" alt=""
                                            width="100px">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="switch" data-id="{{ $product->id }}"
                                            data-field="is_active" {{ $product->is_active ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="switch" data-id="{{ $product->id }}"
                                            data-field="is_hot" {{ $product->is_hot ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="switch" data-id="{{ $product->id }}"
                                            data-field="is_good_deal" {{ $product->is_good_deal ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input type="checkbox" class="switch" data-id="{{ $product->id }}"
                                            data-field="is_show_home" {{ $product->is_show_home ? 'checked' : '' }}>
                                    </td>
                                    <td>{{ $product->views }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('product-variant', $product->id) }}"
                                                        class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View
                                                        Variant</a></li>
                                                <li><a href="{{ route('image', $product->id) }}" class="dropdown-item"><i
                                                            class="ri-eye-fill align-bottom me-2 text-muted"></i> View
                                                        Image</a></li>
                                                <li><a href="{{ route('edit-product', $product->id) }}"
                                                        class="dropdown-item edit-item-btn"><i
                                                            class="ri-pencil-fill align-bottom me-2 text-muted"></i>
                                                        Edit</a></li>
                                            </ul>
                                        </div>
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
    <!--daterangepicker css-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <!--datatable css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" />
    <!--datatable responsive css-->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
    <!-- Bootstrap Switch -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endsection

@section('script-libs')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!--daterangepicker js-->
    <script src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
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
    <!-- Bootstrap Switch -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            var table = $('#example').DataTable({
                order: [
                    [0, 'desc']
                ]
            });

            // Initialize Date Range Picker
            $('#date-range-filter').daterangepicker({
                locale: {
                    format: 'YYYY-MM-DD'
                },
                opens: 'left'
            }, function(start, end, label) {
                // Apply the date range filter
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var min = start.format('YYYY-MM-DD');
                        var max = end.format('YYYY-MM-DD');
                        var createdAt = data[9]; // Use data for the created_at column

                        if (
                            (min === null && max === null) ||
                            (min === null && createdAt <= max) ||
                            (min <= createdAt && max === null) ||
                            (min <= createdAt && createdAt <= max)
                        ) {
                            return true;
                        }
                        return false;
                    }
                );
                table.draw();
                $.fn.dataTable.ext.search.pop();
            });

            // Category filter
            $('#category-filter').on('change', function() {
                var selectedCategory = $(this).val();
                $.fn.dataTable.ext.search.push(
                    function(settings, data, dataIndex) {
                        var category = data[2]; // Use data for the category column
                        if (selectedCategory === "" || category === selectedCategory) {
                            return true;
                        }
                        return false;
                    }
                );
                table.draw();
                $.fn.dataTable.ext.search.pop();
            });

            // Function to initialize switches
            function initializeSwitches() {
                // Initialize Bootstrap Toggle switches
                $('.switch').bootstrapToggle({
                    on: 'YES',
                    off: 'NO',
                    size: 'small'
                }).change(function() {
                    var id = $(this).data('id');
                    var field = $(this).data('field');
                    var isChecked = $(this).prop('checked');

                    // AJAX request to update status
                    $.ajax({
                        url: '{{ route('update-product-status') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id,
                            field: field,
                            value: isChecked
                        },
                        success: function(response) {
                            if (response.success) {
                                // Show success toast
                                showToast('Status updated successfully!', 'success');
                            } else {
                                // Show error toast
                                showToast('Failed to update status.', 'error');
                            }
                        }
                    });
                });
            }

            // Function to show toast messages
            function showToast(message, type) {
                var toastContainer = $('#toast-container');
                var autoHideDelay = 5000; // 5 seconds

                var toastClass = 'bg-' + (type === 'success' ? 'success' : 'danger');
                var toast = $('<div class="toast text-white ' + toastClass +
                    '" role="alert" aria-live="assertive" aria-atomic="true">' +
                    '<div class="toast-header">' +
                    '<strong class="me-auto">Notification</strong>' +
                    '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>' +
                    '</div>' +
                    '<div class="toast-body">' + message + '</div>' +
                    '</div>');

                // Append toast to container and show it
                toastContainer.append(toast);
                var bootstrapToast = new bootstrap.Toast(toast[0], {
                    delay: autoHideDelay
                });
                bootstrapToast.show();

                // Remove toast after it's hidden
                toast.on('hidden.bs.toast', function() {
                    toast.remove();
                });
            }


            // Initialize switches on page load
            initializeSwitches();

            // Re-initialize switches on DataTable redraw
            table.on('draw', function() {
                initializeSwitches();
            });
        });

        // Apply the search on each select change
        $('#filterID, #filterName, #filterCategory, #filterActive, #filterHotDeal, #filterGoodDeal, #filterShowHome, #filterViews, #filterCreatedAt, #filterUpdatedAt')
            .on('change', function() {
                let val = $.fn.dataTable.util.escapeRegex($(this).val());
                table.column($(this).parent().index() + ':visible').search(val ? '^' + val + '$' : '', true,
                    false).draw();
            });

        // Edit item modal handling
        $('.edit-item-btn').on('click', function() {
            let id = $(this).data('id');
            let status = $(this).data('status');
            let payment = $(this).data('payment');

            $('#editOrderId').val(id);
            $('#editOrderStatus').val(status);
            $('#editOrderPayment').val(payment);
            $('#editItemForm').attr('action', 'edit-order/' + id); // Adjust the URL as needed

            // Disable select inputs based on conditions
            if (status == 1) {
                $('#editOrderStatus').prop('disabled', true);
            } else {
                $('#editOrderStatus').prop('disabled', false);
            }

            if (payment == 1) {
                $('#editOrderPayment').prop('disabled', true);
            } else {
                $('#editOrderPayment').prop('disabled', false);
            }

            $('#editItemModal').modal('show');
        });

        // Edit item form submission
        $('#editItemForm').on('submit', function(e) {
        e.preventDefault();

        // Re-enable selects before submitting the form to ensure data is sent
        if ($('#editOrderStatus').prop('disabled')) {
            $('#editOrderStatus').prop('disabled', false);
        }

        if ($('#editOrderPayment').prop('disabled')) {
            $('#editOrderPayment').prop('disabled', false);
        }

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
    </script>
@endsection
