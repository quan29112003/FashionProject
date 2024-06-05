@extends('layout.layoute')
@section('content')
    <form action="{{ route('handleEdit-block',['id' => $block->id]) }}" method="POST" class="form-inline" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" value="{{ $block->title }}">
        </div>

        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control" name="image" value="{{ $block->image }}">
        </div>

        <div class="form-group">
            <label for="">Content</label>
            <input type="text" class="form-control" name="content" value="{{ $block->content }}">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@endsection
