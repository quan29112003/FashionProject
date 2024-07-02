@extends('admin.layouts.master')

@section('title')
    Danh sách Biến thể sản phẩm
@endsection

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Danh sách Biến thể sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh sách Biến thể sản phẩm</a></li>
                        <li class="breadcrumb-item active">Danh sách Biến thể sản phẩm</li>
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
                            <th>Color</th>
                            <th>Size</th>
                            <th>Quantity</th>
                            <th>Price Regular</th>
                            <th>Price Sale</th>
                            <th>SKU</th>
                            <th>Active</th>
                            <th>Created at</th>
                            <th>Updated at</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @php

                            @endphp
                            @foreach($productVariant as $pr)

                                <tr>
                                    <td>{{ $pr->id }}</td>
                                    <td>{{ $pr->color->color }}</td>
                                    <td>{{ $pr->size->size }}</td>
                                    <td>{{ $pr->quantity }}</td>
                                    <td>{{ $pr->price }}</td>
                                    <td>{{ $pr->price_sale }}</td>
                                    <td>{{ $pr->SKU }}</td>
                                    <td>{{ $pr->is_active }}</td>
                                    <td>{{ $pr->created_at }}</td>
                                    <td>{{ $pr->updated_at }}</td>
                                    <td>
                                        <div class="dropdown d-inline-block">
                                            <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="ri-more-fill align-middle"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a href="{{ route('edit-productVariant',$pr->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
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
