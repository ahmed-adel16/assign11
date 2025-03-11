<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .content-wrapper {
            flex: 1;
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100"> 

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
            <a class="navbar-brand" href="{{ route('products.index') }}">E-Commerce</a>

            <form class="d-flex" action="{{ route('products.search') }}" method="GET">
                <input class="form-control me-2" type="search" name="query" placeholder="Search products...">
                <button class="btn btn-outline-light" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container content-wrapper mt-4"> 
        @yield('content')
    </div>

    <footer class="bg-dark text-white text-center p-3 mt-auto">
        ahmed.be1556@gmail.com
    </footer>

</body>
</html>
