<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Sirkula.id') | Praktikum</title>
<link rel="stylesheet" href="{{ asset('css/sirkula.css') }}">
    <script src="{{ asset('js/sirkula.js') }}" defer></script>
</head>
<body>
    <div class="phone">
        @yield('content')
    </div>
</body>
</html>
