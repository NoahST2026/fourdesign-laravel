<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;


class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        return view('projects.index', compact('projects'));
    }


    public function show(Project $project)
        {
            return view('projects.show', compact('project'));
        }

    public function create()
        {
            return view('projects.create');
        }

    public function store(StoreProjectRequest $request)
        {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('projects', 'public');
            }

            Project::create($data);

            return redirect()
                ->route('projects.index')
                ->with('success', 'Project succesvol aangemaakt!!');
        }


    public function edit(Project $project)
        {
            return view('projects.edit', compact('project'));
        }

    public function update(UpdateProjectRequest $request, Project $project)
        {
            $data = $request->validated();

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('projects', 'public');
            }

            $project->update($data);

            return redirect()
                ->route('projects.show', $project)
                ->with('success', 'Dit Project is Geupdated!!');
        }

    public function destroy(Project $project)
        {
            $project->delete();

            return redirect('/projects')
                ->with('success', 'Project succesvol verwijderd!!');
        }
        
}
