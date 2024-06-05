@extends('layout.layoute')
@section('content')
    <form action="{{ route('handleEdit-blog',['id' => $blog->id]) }}" method="POST" class="form-inline" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $blog->title }}">
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image" value="{{ $blog->image }}">
        </div>

        <div class="form-group">
            <label for="">Content</label>
            <input type="text" class="form-control" name="content" value="{{ $blog->content }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
