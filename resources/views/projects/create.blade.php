@extends('layouts.main')

@section('title', 'Add project')

@section('content')
<div class="form-page">

    <h1>Add project</h1>

    @if ($errors->any())
    <div class="form-errors">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif


    <form method="POST"
      action="{{ route('projects.store') }}"
      novalidate
      class="form-card"
      enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label>Title</label>
            <input type="text" name="title" value="{{ old('title') }}" placeholder="Project title">

        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="4" placeholder="Project description">{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label>URL</label>
            <input type="url" name="url" value="{{ old('url') }}" placeholder="Project URL">
        </div>

        <div class="form-group form-group--image">
            <label>Project image</label>

            <input type="file" name="image">

            <small class="help-text">
                Optional – upload a project image
            </small>
        </div>

        <div class="form-actions">
            <a href="{{ route('projects.index') }}">Cancel</a>

            <button type="submit" class="btn btn--primary">
                Save project
            </button>
        </div>
    </form>

</div>
@endsection
