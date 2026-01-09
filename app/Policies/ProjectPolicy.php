<?php

namespace App\Policies;

use App\Models\Project;
use App\Models\User;

class ProjectPolicy
{
    public function before(User $user)
    {
        if ($user->is_admin) {
            return true;
        }
    }
    
    public function viewAny(User $user): bool
    {
        return true;
    }

    public function view(User $user, Project $project): bool
    {
        return $project->user_id === $user->id;
    }

    public function create(User $user): bool
    {
        return true;
    }

    public function update(User $user, Project $project): bool
    {
        return $project->user_id === $user->id;
    }

    public function delete(User $user, Project $project): bool
    {
        return $project->user_id === $user->id;
    }
}
