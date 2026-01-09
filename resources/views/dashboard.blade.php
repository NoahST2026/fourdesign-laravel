@extends('layouts.app')

@section('content')
    <h1>User Dashboard</h1>

    <div class="card">
        <h3>Mijn projecten</h3>
        <p>{{ $projectsCount }}</p>
    </div>
@endsection
