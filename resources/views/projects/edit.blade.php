@extends('layouts.main')

@section('title', 'Edit project')

@section('content')
<div class="form-page">

    <h1>Edit Project</h1>

    <form method="POST"
          action="{{ route('projects.update', $project) }}"
          class="form-card"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Title</label>
            <input
                type="text"
                name="title"
                value="{{ old('title', $project->title) }}"
            >
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea
                name="description"
                rows="4"
            >{{ old('description', $project->description) }}</textarea>
        </div>

        <div class="form-group">
            <label>URL</label>
            <input
                type="url"
                name="url"
                value="{{ old('url', $project->url) }}"
            >
        </div>

        <div class="form-group form-group--image">
            <label>Project Image</label>

            @if($project->image)
                <div class="image-preview" style+>
                    <img
                        src="{{ asset('storage/' . $project->image) }}"
                        alt="{{ $project->title }}"
                        style="border-radius: 14px; margin-bottom: 10px; margin-top: 10px;"
                    >
                </div>
            @endif

            <input type="file" name="image">

            <small class="help-text">
                Leave empty to keep current image
            </small>
        </div>

        <div class="form-actions">
            <a href="{{ route('projects.index') }}">Cancel</a>


            <button type="submit" class="btn btn--primary">
                Update project
            </button>
        </div>

    </form>

</div>
@endsection
