<!DOCTYPE html>
<html lang="lv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Laravel blogs' }}</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <x-navigation></x-navigation>

    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>
