@extends('admin.layouts.master')

@section('title')
    Ảnh sản phẩm
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Danh sách ảnh</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                    <li class="breadcrumb-item active">Danh sách ảnh</li>
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
                        <th>Ảnh</th>
                        <th>Create At</th>
                        <th>Update At</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>

                        @foreach($images as $img)
                            <tr>

                                <td>{{ $img->id }}</td>
                                <td>
                                    <img src="{{ asset('uploads/'. $img->url) }}" alt="" width="100px">
                                </td>
                                <td>{{ $img->created_at }}</td>
                                <td>{{ $img->updated_at }}</td>
                                <td>
                                    <div class="dropdown d-inline-block">
                                        <button class="btn btn-soft-secondary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ri-more-fill align-middle"></i>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end">
                                            <li><a href="{{ route('edit-image',$img->id) }}" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Edit</a></li>
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
