@extends('admin.layouts.master')

@section('title')
    Thêm mới Danh mục Sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Sửa biến thể sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Biến thể Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Sửa</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    @foreach ($productVariant as $pr )
    <form action="{{ route('handleEdit-productVariant',['id'=>$pr->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">Thông tin</h4>
                    </div><!-- end card header -->
                    <div class="card-body">
                        <div class="live-preview">
                            <div class="row gy-4">
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Màu</label>
                                            <select class="form-select rounded-pill mb-3" name="color_id" aria-label="Default select example">
                                                <option value="{{ $pr->color->id }}">{{ $pr->color->color }}</option>
                                                @foreach ($productColor as $pc )
                                                <option value="{{ $pc->id }}">{{ $pc->color }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Kích cỡ</label>
                                            <select class="form-select rounded-pill mb-3" name="size_id" aria-label="Default select example">
                                                <option value="{{ $pr->size->id }}">{{ $pr->size->size }}</option>
                                                @foreach ($productSize as $pz )
                                                <option value="{{ $pz->id }}">{{ $pz->size }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Số lượng</label>
                                            <input type="text" class="form-control" name="quantity" value="{{ $pr->quantity }}" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Giá thường</label>
                                            <input type="text" class="form-control" name="price" value="{{ $pr->price }}" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Giá khuyến mãi</label>
                                            <input type="text" class="form-control" name="price_sale" value="{{ $pr->price_sale }}" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">SKU</label>
                                            <input type="text" class="form-control" name="SKU" value="{{ $pr->SKU }}" id="name">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Active</label>
                                            <select class="form-select rounded-pill mb-3" name="is_active" aria-label="Default select example">
                                                <option value="1">Active</option>
                                                <option value="0">In Active</option>
                                            </select>
                                        </div>
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <button class="btn btn-primary" type="submit">Sửa</button>
                                        </div><!-- end card header -->
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end col-->
        </div>

    </form>
    @endforeach
@endsection
