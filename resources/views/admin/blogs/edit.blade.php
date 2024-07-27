@extends('admin.layouts.master')

@section('title')
    Sửa Blog
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Sửa Blog</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Blog</a></li>
                        <li class="breadcrumb-item active">Sửa</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST">
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
                                <div class="col-md-6">
                                    <div>
                                        <label for="title" class="form-label">Title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                            value="{{ $blog->title }}" required>
                                        @error('title')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div>
                                        <label for="content" class="form-label">Content</label>
                                        <textarea class="form-control" id="content" name="content" rows="5" required>{{ $blog->content }}</textarea>
                                        @error('content')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                                <div class="col-md-4">
                                    <div>
                                        <label for="image" class="form-label">Image</label>
                                        <input type="hidden" class="form-control" id="image" name="image">
                                        @if ($blog->image)
                                            <img src="{{ asset('images/' . $blog->image) }}" alt="{{ $blog->title }}"
                                                width="100">
                                        @endif
                                        @error('email')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <button class="btn btn-primary" type="submit">Cập Nhật</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@section('script-libs')
<script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content', {
        filebrowserUploadUrl: "{{ route('admin.blogs.upload', ['_token' => csrf_token()]) }}",
        filebrowserUploadMethod: 'form',
        on: {
            'fileUploadRequest': function(evt) {
                var xhr = evt.data.fileLoader.xhr;
                xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');
            },
            'fileUploadResponse': function(evt) {
                evt.stop();
                var data = evt.data,
                    xhr = data.fileLoader.xhr,
                    response = JSON.parse(xhr.responseText);

                if (response.url) {
                    data.url = response.url;
                    evt.data.fileLoader.onSuccess(data.url);
                } else {
                    evt.data.fileLoader.onError('File upload failed.');
                }

                // Update image input field
                document.getElementById('image').value = response.url.split('/').pop();
            }
        }
    });
</script>
@endsection