<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Auth\Access\AuthorizationException;

class ProjectController extends Controller
{
public function index()
{
    $projects = Project::where('user_id', auth()->id())
        ->latest()
        ->get();

    return view('projects.index', compact('projects'));
}




    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        $this->authorize('create', Project::class);

        return view('projects.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['required'],
        'url' => ['nullable', 'url'],
        'image' => ['nullable', 'image'],
    ]);

    $data['user_id'] = auth()->id();

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('projects', 'public');
    }

    Project::create($data);

    return redirect()
        ->route('projects.index')
        ->with('success', 'Project succesvol aangemaakt!');
}


    public function edit(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.edit', compact('project'));
    }

    public function update(UpdateProjectRequest $request, Project $project)
    {
        $this->authorize('update', $project);

        $data = $request->validated();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()
            ->route('projects.show', $project)
            ->with('success', 'Project geüpdatet!');
    }

    public function destroy(Project $project)
    {
        $this->authorize('delete', $project);

        $project->delete();

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project verwijderd!');
    }
}
