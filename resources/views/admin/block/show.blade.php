@extends('layout.layoute')
@section('content')
    <table class="table">
        <thead>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Image</th>
            <th scope="col">Content</th>
            <th scope="col">Action</th>
        </thead>

        <tbody>
            @foreach($block as $bl)
            <tr>
                <th>{{ $bl->id }}</th>
                <th>{{ $bl->title }}</th>
                <th><img src="{{ $bl->image?''.asset($bl->image):'' }}" width="100px" alt=""></th>
                <th>{{ $bl->content }}</th>
                <th>
                    <a href="{{ route('add-block') }}">Add</a>
                    <a href="{{ route('edit-block',['id'=>$bl->id]) }}">Edit</a>
                    <a href="{{ route('delete-block',['id'=>$bl->id]) }}">Delete</a>

                </th>
            </tr>
            @endforeach
        </tbody>
    </table>

@endsection
