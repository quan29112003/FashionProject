<!DOCTYPE html>
<html>

<head>
    <title>Admin</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <header class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Admin</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('admin.products.index') }}">Products</a>
                </li>
            </ul>
        </div>
    </header>
    <main class="container mt-4">
        @yield('content')
    </main>
    <footer class="text-center mt-4">
        <p>Admin Footer</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
