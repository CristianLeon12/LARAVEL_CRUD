<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Laravel')</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    @stack('styles')
    <style>
        .pagination {
            display: flex;
            justify-content: center;
            padding-left: 0;
            list-style: none;
            border-radius: 0.25rem;
        }
        .pagination li {
            display: inline;
        }
        .pagination li a, .pagination li span {
            color: #0dc1e9;
            padding: 0.5rem 0.75rem;
            text-decoration: none;
            border: 1px solid #dee2e6;
            margin-left: -1px;
            line-height: 1.25;
        }
        .pagination li a:hover {
            background-color: #f8f9fa;
        }
        .pagination .active span {
            background-color: #0dc1e9;
            border-color: #0dc1e9;
            color: white;
        }
        .pagination .disabled span {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Sistema Educativo</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('categorias.index') }}">Categorías</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('videojuegos.index') }}">Videojuegos</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                @yield('content')
            </div>
        </main>
    </div>

    <!-- Bootstrap JS and Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

    <!-- Custom JS -->
    @stack('scripts')
</body>
</html>
