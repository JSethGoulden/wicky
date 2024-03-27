<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Wicky</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @media (min-width: 768px) {
            .grid-cols-1>* {
                margin-right: 0;
            }
        }
    </style>
</head>

<body class="antialiased bg-slate-200 text-slate-700 mx-2">
    {{ $slot }}
</body>

</html>
