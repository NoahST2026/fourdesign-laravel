@extends('layouts.main')

@section('title', $project->title)

@section('content')
<div class="page">

    <a href="{{ route('projects.index') }}" class="back-link">
        ← Back to projects
    </a>

    <div class="card project-card">

        <h1>{{ $project->title }}</h1>

        @if($project->image)
            <div class="project-image">
                <img
                    src="{{ asset('storage/' . $project->image) }}"
                    alt="{{ $project->title }}">
            </div>
        @endif

        @if($project->description)
            <p class="project-description">
                {{ $project->description }}
            </p>
        @endif

        @if($project->url)
            <a href="{{ $project->url }}"
               target="_blank"
               class="btn btn--primary">
                Visit project
            </a>
        @endif

        <div class="actions">
            <a href="{{ route('projects.edit', $project) }}"
               class="btn btn--secondary">
                Edit
            </a>

            <button
                class="btn btn--danger"
                data-modal="delete-modal"
                data-id="{{ $project->id }}">
                Delete
            </button>

            <form
                id="delete-form-{{ $project->id }}"
                method="POST"
                action="{{ route('projects.destroy', $project) }}"
                style="display:none;">
                @csrf
                @method('DELETE')
            </form>
        </div>

    </div>

</div>
@endsection