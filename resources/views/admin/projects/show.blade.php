@extends('layouts.admin')

@section('content')
<div class="max-w-5xl mx-auto space-y-6">

    {{-- Back link --}}
    <a href="{{ route('admin.projects.index') }}"
       class="text-sm text-gray-400 hover:text-white flex items-center gap-2">
        ← Terug naar alle projecten
    </a>

    {{-- Project card --}}
    <div class="bg-slate-800 rounded-xl overflow-hidden shadow-lg">

        {{-- Image --}}
        @if($project->image)
            <img
                src="{{ asset('storage/' . $project->image) }}"
                alt="{{ $project->title }}"
                class="w-full h-80 object-cover"
            >
        @endif

        <div class="p-6 space-y-4">

            {{-- Title --}}
            <h1 class="text-3xl font-bold text-white">
                {{ $project->title }}
            </h1>

            {{-- Description --}}
            <p class="text-gray-300">
                {{ $project->description }}
            </p>

            {{-- Meta --}}
            <p class="text-sm text-gray-400">
                Gebruiker: <span class="text-white">{{ $project->user->name }}</span>
            </p>

            {{-- Actions --}}
            <div class="flex gap-4 pt-4">

                {{-- Edit --}}
                <a href="{{ route('admin.projects.edit', $project) }}"
                   class="px-4 py-2 rounded-lg bg-blue-600 hover:bg-blue-500 text-white">
                    Bewerken
                </a>

                {{-- Delete --}}
                <form action="{{ route('admin.projects.destroy', $project) }}"
                      method="POST"
                      onsubmit="return confirm('Weet je zeker dat je dit project wilt verwijderen?')">
                    @csrf
                    @method('DELETE')

                    <button
                        type="submit"
                        class="px-4 py-2 rounded-lg bg-red-600 hover:bg-red-500 text-white">
                        Verwijderen
                    </button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
