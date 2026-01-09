<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Projects')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    @include('layouts.navigation')

    @if (session('success'))
    <div class="flash flash--success">
        {{ session('success') }}
    </div>
@endif

    <main class="py-8">
        @yield('content')
    </main>

</body>
</html>
