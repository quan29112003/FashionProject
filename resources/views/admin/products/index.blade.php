@extends('admin.layouts.master')

@section('title')
    Danh sách Sản phẩm
@endsection

@section('content')
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
                    <table id="example"
                           class="table table-bordered dt-responsive nowrap table-striped align-middle"
                           style="width:100%">

                        <thead>
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
                            @foreach($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td>{{ $product->name_product }}</td>
                                    <td>{{ $product->category->name }}</td>
                                    <td>
                                        <img src="{{ asset('uploads/'. $product->thumbnail) }}" alt="" width="100px">
                                    </td>
                                    <td>{!! $product->is_active ? '<span class="badge bg-primary">YES</span>'
                                        : '<span class="badge bg-danger">NO</span>' !!}</td>
                                    <td>{!! $product->is_hot ? '<span class="badge bg-primary">YES</span>'
                                                                    : '<span class="badge bg-danger">NO</span>' !!}</td>
                                    <td>{!! $product->is_good_deal ? '<span class="badge bg-primary">YES</span>'
                                                                    : '<span class="badge bg-danger">NO</span>' !!}</td>
                                    <td>{!! $product->is_show_home ? '<span class="badge bg-primary">YES</span>'
                                                                    : '<span class="badge bg-danger">NO</span>' !!}</td>

                                    <td>{{ $product->views }}</td>
                                    <td>{{ $product->created_at }}</td>
                                    <td>{{ $product->updated_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('product-variant',$product->id) }}" class="dropdown-item"><i class="ri-eye-fill align-bottom me-2 text-muted"></i> View Variant</a></li>
                                                <li><a href="{{ route('edit-product',$product->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
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
