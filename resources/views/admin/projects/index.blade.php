@extends('layouts.app')

@section('content')
<div class="admin-projects">

    <div class="projects-header">
        <h1>Alle projecten</h1>

        <input
            type="text"
            id="projectFilter"
            placeholder="Zoek op titel of gebruiker..."
        >
    </div>

    <div class="projects-grid" id="projectsGrid">
        @foreach($projects as $project)
            <div
                class="project-card"
                data-title="{{ strtolower($project->title) }}"
                data-user="{{ strtolower($project->user->name ?? '') }}"
            >
                <h2>{{ $project->title }}</h2>

                <p class="project-user">
                    {{ $project->user->name ?? 'Onbekend' }}
                </p>

                <p class="project-email">
                    {{ $project->user->email ?? '—' }}
                </p>

                <span class="project-date">
                    {{ $project->created_at->format('d-m-Y') }}
                </span>
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

