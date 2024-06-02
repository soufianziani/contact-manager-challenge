<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-custom-lighter-blue p-5">
    <div class="container mx-auto max-w-[1200px] py-5">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
