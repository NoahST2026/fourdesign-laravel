<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    {{-- Navigation --}}
    @include('layouts.navigation')
    {{-- of: @include('partials.navigation') --}}

    {{-- Page content --}}
    <main class="pt-6">
        @yield('content')
    </main>

</body>
</html>
