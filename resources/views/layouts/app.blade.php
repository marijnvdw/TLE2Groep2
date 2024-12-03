<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Open hiring' }}</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-light-moss text-dark-moss font-sans">
<!-- Header -->
<x-header />

<!-- Main content -->
<main class="container mx-auto py-8">
    @yield('content')
</main>

<!-- Footer -->
<x-footer />
</body>
</html>
