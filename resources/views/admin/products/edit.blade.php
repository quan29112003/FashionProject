@extends('admin.layouts.master')

@section('title')
    Thêm mới Danh mục Sản phẩm
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Thêm mới Danh mục Sản phẩm</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Danh mục Sản phẩm</a></li>
                        <li class="breadcrumb-item active">Thêm mới</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    @foreach ($product as $pr )
    <form action="{{ route('handleEdit-product',['id'=>$pr->id]) }}" method="POST" enctype="multipart/form-data">
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
                                            <label for="name" class="form-label">Category</label>
                                            <select class="form-select rounded-pill mb-3" name="category_id" aria-label="Default select example">
                                                <option value="{{ $pr->category->id }}">{{ $pr->category->name }}</option>
                                                @foreach ($category as $ct )
                                                <option value="{{ $ct->id }}">{{ $ct->name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" name="name_product" value="{{ $pr->name_product }}" id="name">
                                        </div>
                                        @error('name_product')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <div>
                                            <label for="name" class="form-label">Thumbnail</label>
                                            @php
                                                $url = $pr->thumbnail;
                                            @endphp
                                            <input type="file" class="form-control" name="thumbnail" value="{{ $url }}" id="name">
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

                                    <div class="col-lg-12">
                                        <h1>Description</h1>
                                        <textarea name="description" value="{{ $pr->description }}" id="editor">
                                            <p>This is some sample content.</p>
                                        </textarea>
                                        @error('description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-header align-items-center d-flex">
                                            <button class="btn btn-primary" type="submit">Save</button>
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

    <script>
        ClassicEditor
        .create(document.querySelector('#editor'))
        .catch(error => {
            console.error(error);
        });
    </script>
    @endforeach
@endsection