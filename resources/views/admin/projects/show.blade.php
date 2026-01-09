@extends('layouts.admin')

@section('content')
<div class="admin-project-view">

    <a href="{{ route('admin.projects.index') }}" class="back-link">
        ← Terug naar alle projecten
    </a>

    <div class="card">
        <h1>{{ $project->title }}</h1>

        <p>{{ $project->description }}</p>

        <p class="meta">
            Gebruiker: <strong>{{ $project->user->name }}</strong>
        </p>
    </div>
</div>
@endsection
