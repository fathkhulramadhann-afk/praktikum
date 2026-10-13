<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Praktikum Blade')</title>
</head>
<body>
    @include('partials.navbar')
    <main>@yield('content')</main>
    <footer style="margin-top:20px">&copy; {{ date('Y') }}</footer>
</body>
</html>