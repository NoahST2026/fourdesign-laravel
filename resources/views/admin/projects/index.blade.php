@extends('layouts.admin')

@section('content')
<div class="admin-projects-page">

    <div class="page-header">
        <h1>All Projects</h1>
    </div>

    <div class="projects-grid">
        @foreach($projects as $project)
            <div class="project-card">

                <div class="project-image">
                    @if($project->image)
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}">
                    @else
                        <div class="image-placeholder"></div>
                    @endif

                    <div class="user-overlay">
                        {{ $project->user->name ?? 'Unknown user' }}
                    </div>
                </div>

                <div class="project-content">
                    <h2>{{ $project->title }}</h2>
                    <p>{{ $project->description }}</p>

                    <div class="actions">
                        <a href="{{ route('admin.projects.show', $project) }}">View</a>
                        <a href="{{ route('admin.projects.edit', $project) }}">Edit</a>
                    </div>
                </div>

            </div>
        @endforeach
    </div>

</div>
@endsection


@push('scripts')
<script>
document.getElementById('projectFilter').addEventListener('input', function () {
    const value = this.value.toLowerCase();
    const cards = document.querySelectorAll('.project-card');

    cards.forEach(card => {
        const title = card.dataset.title;
        const user  = card.dataset.user;

        if (title.includes(value) || user.includes(value)) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
});
</script>
@endpush

