<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class AdminProjectController extends Controller
{
    public function index()
    {
       $projects = Project::with('user')->latest()->get();

        return view('admin.projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        $this->authorize('view', $project);

        return view('admin.projects.show', compact('project'));
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
    return view('admin.projects.edit', compact('project'));
}

public function update(Request $request, Project $project)
{
    $data = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
    ]);

    if ($request->hasFile('image')) {
        // oude image verwijderen
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $data['image'] = $request->file('image')->store('projects', 'public');
    }

    $project->update($data);

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project succesvol bijgewerkt.');
}


public function destroy(Project $project)
{
    // Optional: image verwijderen
    if ($project->image) {
        \Storage::disk('public')->delete($project->image);
    }

    $project->delete();

    return redirect()
        ->route('admin.projects.index')
        ->with('success', 'Project succesvol verwijderd.');
}

}
