<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Blog Home - Start Bootstrap Template</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{assert('images/favicon.ico')}}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    @vite(['resources/js/app.js'])
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    @include('partials.navbar')
</nav>
<header class="py-5 bg-light border-bottom mb-4">
</header>
<div class="container">
    @if(Route::is('home'))
         @include('partials.content')
    @else
        @yield('container')
    @endif
</div>
</body>
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Akhil Machine Test</p></div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
</html>
