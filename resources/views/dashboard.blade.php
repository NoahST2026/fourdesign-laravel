@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-8">

    {{-- Header / welkom --}}
    <div class="mb-10">
        <h1 class="text-3xl font-normal text-white">
            Welkom terug, {{ auth()->user()->name }} 👋
        </h1>

        <p class="text-gray-400 mt-2 max-w-xl">
            Fijn dat je er bent. Hieronder zie je de status van je account
            en een overzicht van je meest recente projecten.
        </p>
    </div>

    {{-- Stat cards --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="card">
            <p class="text-sm text-gray-400">Totaal aantal projecten</p>
            <p class="text-3xl font-bold mt-1">
                {{ $projects->count() }}
            </p>
        </div>

        <div class="card">
            <p class="text-sm text-gray-400">Laatste aangemaakte project</p>
            <p class="font-semibold mt-1">
                {{ $projects->last()?->title ?? 'Nog geen projecten aangemaakt' }}
            </p>
        </div>

        <div class="card">
            <p class="text-sm text-gray-400">Account status</p>
            <div class="flex items-center gap-2 mt-1">
                <span class="inline-block w-2 h-2 bg-green-500 rounded-full"></span>
                <span class="text-green-500 font-semibold">
                    Actief
                </span>
            </div>
        </div>
    </div>

    {{-- Recente projecten --}}
    <div class="mt-14">
        <div class="flex items-center justify-between mb-4">
            <h2 class="text-xl font-semibold">
                Recente projecten
            </h2>

            @if($projects->count() > 3)
                <a href="{{ route('projects.index') }}"
                   class="text-sm text-blue-500 hover:underline">
                    Bekijk alle projecten →
                </a>
            @endif
        </div>

        @if($projects->isEmpty())
            <p class="text-gray-400">
                Je hebt nog geen projecten aangemaakt. Begin vandaag nog!
            </p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($projects->take(3) as $project)
                    <div class="card flex flex-col justify-between">
                        <div>
                            <h2 class="font-normal text-white">
                                {{ $project->title }}
                            </h2>

                            <p class="text-sm text-gray-400 mt-1">
                                Aangemaakt op {{ $project->created_at->format('d-m-Y') }}
                            </p>

                            @if($project->description)
                                <p class="text-sm text-gray-300 mt-3 line-clamp-3">
                                    {{ $project->description }}
                                </p>
                            @endif
                        </div>

                        <a href="{{ route('projects.show', $project) }}"
                           class="text-blue-500 text-sm mt-4 inline-flex items-center gap-1 hover:underline">
                            Bekijk project
                            <span>→</span>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    {{-- CTA --}}
    <div class="mt-14 flex justify-start">
        <a href="{{ route('projects.create') }}"
           class="btn-primary">
            + Nieuw project aanmaken
        </a>
    </div>

</div>

@endsection
