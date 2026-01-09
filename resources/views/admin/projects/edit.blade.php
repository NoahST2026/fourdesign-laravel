@extends('layouts.admin')

@section('content')
<div class="admin-project-edit">

    <a href="{{ route('admin.projects.index') }}" class="back-link">
        ← Terug naar alle projecten
    </a>

    <div class="card">
        <h1>Project bewerken</h1>

        <form method="POST" action="{{ route('admin.projects.update', $project) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Titel</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $project->title) }}"
                    required
                >
            </div>

            <div class="form-group">
                <label>Beschrijving</label>
                <textarea
                    name="description"
                    rows="5"
                >{{ old('description', $project->description) }}</textarea>
            </div>

            <div class="form-group">
                <label>Gebruiker</label>
                <input
                    type="text"
                    value="{{ $project->user->name }}"
                    disabled
                >
            </div>

            <button type="submit" class="btn-primary">
                Opslaan
            </button>
        </form>
    </div>
</div>
@endsection
