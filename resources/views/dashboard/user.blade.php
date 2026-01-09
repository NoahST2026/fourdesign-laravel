@extends('layouts.app')

@section('content')
    <h1>Dashboard</h1>
    <p>Welkom {{ auth()->user()->name }}</p>

    <div class="card">
        <h3>Mijn projecten</h3>
        <p>{{ $projects->count() }}</p>

        <a href="{{ route('projects.index') }}">
            Bekijk mijn projecten
        </a>
    </div>
@endsection
