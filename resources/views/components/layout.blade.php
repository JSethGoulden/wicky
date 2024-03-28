<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wicky</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/js/app.js'])
</head>

<body id="app" class="antialiased bg-slate-200 text-slate-700 mx-2">
    {{ $slot }}
</body>

</html>
