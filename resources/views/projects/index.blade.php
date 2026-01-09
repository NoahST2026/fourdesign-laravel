@extends('layouts.main')

@section('title', 'My Projects')

@section('content')
<div class="projects-page p-6 max-w-7xl mx-auto">

    <div class="projects-header flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">My Projects</h1>

        <a href="{{ route('projects.create') }}"
           class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700">
            + Add project
        </a>
    </div>

    @if($projects->count())
        <ul class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <li class="bg-gray-800 rounded-lg overflow-hidden shadow">

                    {{-- Image --}}
                    @if($project->image)
                        <div class="h-48 bg-black flex items-center justify-center">
                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover"
                            >
                        </div>
                    @endif

                    <div class="p-4">
                        <h2 class="text-lg font-semibold mb-2">
                            {{ $project->title }}
                        </h2>

                        <p class="text-sm text-gray-300 mb-4">
                            {{ $project->description }}
                        </p>

                        <div class="flex justify-between text-sm">
                            <a href="{{ route('projects.show', $project) }}"
                               class="text-indigo-400 hover:underline">
                                View
                            </a>

                            <a href="{{ route('projects.edit', $project) }}"
                               class="text-yellow-400 hover:underline">
                                Edit
                            </a>

                            <form method="POST" action="{{ route('projects.destroy', $project) }}">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn--danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>
    @endif

</div>

@endsection
