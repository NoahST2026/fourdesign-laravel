@extends('layouts.admin')

@section('content')

<div class="max-w-5xl mx-auto px-6">

    {{-- Back link --}}
    <a href="{{ route('admin.projects.index') }}"
       class="inline-flex items-center text-sm text-indigo-400 hover:text-indigo-300 mb-6">
        ← Terug naar alle projecten
    </a>

    {{-- Card --}}
    <div
        class="bg-slate-800/80 backdrop-blur rounded-2xl
               border border-slate-700 shadow-xl p-8"
    >

        <h1 class="text-2xl font-bold mb-6">
            Project bewerken
        </h1>

        <form method="POST"
              action="{{ route('admin.projects.update', $project) }}"
              enctype="multipart/form-data"
              class="space-y-6">

            @csrf
            @method('PUT')

            {{-- Titel --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-300">
                    Titel
                </label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title', $project->title) }}"
                    required
                    class="w-full rounded-lg bg-slate-900 border border-slate-700
                           px-4 py-2 focus:outline-none focus:ring-2
                           focus:ring-indigo-500"
                >
            </div>

            {{-- Beschrijving --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-300">
                    Beschrijving
                </label>
                <textarea
                    name="description"
                    rows="5"
                    class="w-full rounded-lg bg-slate-900 border border-slate-700
                           px-4 py-2 focus:outline-none focus:ring-2
                           focus:ring-indigo-500"
                >{{ old('description', $project->description) }}</textarea>
            </div>

            {{-- Gebruiker --}}
            <div>
                <label class="block text-sm font-medium mb-1 text-gray-300">
                    Gebruiker
                </label>
                <input
                    type="text"
                    value="{{ $project->user->name }}"
                    disabled
                    class="w-full rounded-lg bg-slate-900 border border-slate-700
                           px-4 py-2 text-gray-400 cursor-not-allowed"
                >
            </div>

            {{-- Afbeelding --}}
            <div>
                <label class="block text-sm font-medium mb-2 text-gray-300">
                    Project afbeelding
                </label>

                @if($project->image)
                    <div class="mb-3">
                        <img
                            src="{{ asset('storage/' . $project->image) }}"
                            alt="{{ $project->title }}"
                            class="h-32 rounded-lg object-cover border border-slate-700"
                        >
                    </div>
                @endif

                <input
                    type="file"
                    name="image"
                    class="block w-full text-sm text-gray-400
                           file:bg-slate-700 file:text-white
                           file:border-0 file:px-4 file:py-2
                           file:rounded-md hover:file:bg-slate-600 transition"
                >

                <p class="text-xs text-gray-500 mt-1">
                    Laat leeg om de huidige afbeelding te behouden
                </p>
            </div>

            {{-- Actions --}}
            <div class="flex items-center gap-4 pt-4">
                <button
                    type="submit"
                    class="px-6 py-2 rounded-lg bg-indigo-600
                           hover:bg-indigo-500 transition font-medium"
                >
                    Opslaan
                </button>

                <a href="{{ route('admin.projects.index') }}"
                   class="text-sm text-gray-400 hover:text-gray-300">
                    Annuleren
                </a>
            </div>

        </form>
    </div>

</div>

@endsection
