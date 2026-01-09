<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;

class AdminProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();

        return view('admin.projects.index', compact('projects'));
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

    public function store(StoreProjectRequest $request)
    {
        $this->authorize('create', Project::class);

        $data = $request->validated();
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
