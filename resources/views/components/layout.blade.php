<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ env('APP_NAME') }}</title>
    @viteReactRefresh
    @vite('resources/js/app.jsx')
</head>
<body class="min-h-screen flex flex-col bg-[#F5F1EB] bg-[linear-gradient(160deg,#D0D8E2,#F5F1EB,#D0D8E2)] bg-body-background bg-cover bg-center">
    <x-header />

    <div class="flex flex-grow flex-col justify-between bg-white bg-opacity-50">
        <main class="w-full max-w-screen-lg mx-auto text-center py-6 px-2">
            {{ $slot }}
        </main>

        <x-background-attribution />
    </div>

    <x-footer />
</body>
</html>