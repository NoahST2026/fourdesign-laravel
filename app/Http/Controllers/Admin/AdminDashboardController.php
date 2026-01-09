<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Project;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $projects = Project::with('user')->latest()->get();

        return view('admin.dashboard', [
            'users' => $users,
            'projects' => $projects,
        ]);
    }
}
