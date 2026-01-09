<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Projects')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aldrich&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Nova+Square&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?
    family=Montserrat:ital,wght@0,100..900;1,100..900&
    family=Aldrich&display=swap" rel="stylesheet">
    
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">

    @include('layouts.navigation')

    {{-- Flash message --}}
    @if (session('success'))
        <div class="flash flash--success">
            {{ session('success') }}
        </div>
    @endif

    <main class="py-8">
        @yield('content')
    </main>

    {{-- DELETE CONFIRM MODAL --}}
    <div class="modal modal--danger" id="deleteModal">
        <div class="modal__overlay"></div>

        <div class="modal__content">
            <h2>Delete project</h2>
            <p>
                Are you sure you want to delete this project?
                This action cannot be undone.
            </p>

            <div class="modal__actions">
                <button class="btn btn--secondary" id="cancelDelete">
                    Cancel
                </button>

                <button class="btn btn--danger" id="confirmDelete">
                    Delete
                </button>
            </div>
        </div>
    </div>

</body>
</html>
