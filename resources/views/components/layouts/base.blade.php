<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>POQ, EOQ & Kanban</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=roboto:300,400,500,700,900" rel="stylesheet" />

    @vite(['resources/css/app.css'])
</head>

<body class="w-full min-h-screen antialiased">
    <div class="flex flex-col justify-between h-full min-h-screen">
        @include('components.layouts.base.navbar')

        <main class="flex-1">
            @yield('content')
        </main>

        <footer class="p-4 footer footer-center bg-base-300 text-base-content">
            <aside>
                <p>Copyright © 2024 - Created with tears & headache 🫰🫰🫰</p>
            </aside>
        </footer>
    </div>

    @vite(['resources/js/app.js'])
</body>

</html>
