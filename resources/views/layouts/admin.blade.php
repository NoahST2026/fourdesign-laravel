@extends('layouts.main')

@section('body')
    @include('layouts.navigation')

    <main class="px-8 py-10">
        <div class="max-w-6xl mx-auto">
            @yield('content')
        </div>
    </main>
@endsection
