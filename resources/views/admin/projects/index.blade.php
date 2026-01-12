@extends('layouts.admin')

@section('content')

<div class="max-w-7xl mx-auto px-6">

    {{-- Header --}}
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold">All Projects</h1>
            <p class="text-sm text-gray-400">
                Overzicht van alle projecten in het systeem
            </p>
        </div>
    </div>

    @if($projects->isEmpty())
        <div class="bg-gray-800 rounded-lg p-6 text-gray-400">
            Geen projecten gevonden.
        </div>
    @else
        <ul class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-8 mt-8">
            @foreach($projects as $project)
                <li
                    class="group bg-slate-800/80 backdrop-blur rounded-2xl overflow-hidden
                           border border-slate-700 hover:border-slate-500
                           shadow-md hover:shadow-xl transition-all duration-300"
                >

                    {{-- Image --}}
                    @if($project->image)
                        <div class="h-44 overflow-hidden">
                            <img
                                src="{{ asset('storage/' . $project->image) }}"
                                alt="{{ $project->title }}"
                                class="w-full h-full object-cover
                                       group-hover:scale-105 transition duration-300"
                            >
                        </div>
                    @endif

                    <div class="p-4 space-y-2">
                        <h2 class="text-lg font-semibold">
                            {{ $project->title }}
                        </h2>

                        <p class="text-sm text-gray-400 line-clamp-2">
                            {{ $project->description }}
                        </p>

                        <p class="text-xs text-gray-500">
                            Aangemaakt door
                            <span class="font-medium text-gray-300">
                                {{ $project->user->name }}
                            </span>
                        </p>

                        <div class="flex gap-2 pt-3">
                            <a href="{{ route('admin.projects.show', $project) }}"
                               class="px-3 py-1.5 text-sm rounded-md
                                      bg-gray-700 hover:bg-gray-600 transition">
                                View
                            </a>

                            <a href="{{ route('admin.projects.edit', $project) }}"
                               class="px-3 py-1.5 text-sm rounded-md
                                      bg-indigo-600 hover:bg-indigo-500 transition">
                                Edit
                            </a>
                        </div>
                    </div>

                </li>
            @endforeach
        </ul>
    @endif

</div>

@endsection
