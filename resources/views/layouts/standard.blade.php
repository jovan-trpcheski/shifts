<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"/>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
<!-- Navigation -->
    <nav
        class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
        <div class="mb-2 sm:mb-0">
            <a href="/" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark">Home</a>
        </div>
        <div>
            <a href="/employees" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Employees</a>
            <a href="/shifts" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Shifts</a>
            <a href="/import" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Import</a>
        </div>
    </nav>
    @yield('content')

</body>
</html>
