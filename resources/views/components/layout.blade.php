<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @viteReactRefresh
    @vite('resources/js/app.jsx')
</head>
<body class="min-h-screen flex flex-col">
    <x-header />

    <main class="w-full max-w-screen-lg mx-auto text-center p-8">
        {{ $slot }}
    </main>

    <x-footer />
</body>
</html>