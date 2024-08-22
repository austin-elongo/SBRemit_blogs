<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Your Application')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Add other head elements here -->
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Brand</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link btn" href="{{ route('admin.blogs.index') }}">Blog Posts</a>
                </li>
                <!-- Add more menu items here -->
            </ul>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Include JavaScript files here -->
</body>
</html>
