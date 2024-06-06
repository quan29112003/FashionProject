<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{ route('categories.update', $category->id) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">

            
            <label for="name">description:</label>
            <textarea type="text" class="form-control" id="description" name="description">{{ $category->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Category</button>
    </form>
    
</body>
</html>