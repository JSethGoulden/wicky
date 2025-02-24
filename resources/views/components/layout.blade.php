<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <title>Wicky</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/js/app.js'])
</head>

<body id="app" class="antialiased bg-slate-200 text-slate-700 mx-2">
    {{ $slot }}
</body>

</html>
