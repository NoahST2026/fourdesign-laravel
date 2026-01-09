<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Project;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard', [
            'projectsCount' => Project::where('user_id', $user->id)->count(),
        ]);
    }
}
