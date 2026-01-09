@extends('layouts.app')

@section('content')
<div class="admin-dashboard">

    <div class="admin-container">

        <div class="admin-card">
            <h1 class="admin-title">Welkom Admin!</h1>
            <p class="admin-subtitle">Overzicht van gebruikers en projecten</p>
        </div>

        <!-- USERS -->
        <div class="admin-card">
            <h2 class="admin-section-title">Gebruikers</h2>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Naam</th>
                        <th>Rol</th>
                        <th>Email</th>
                        <th>Password (bcrypt)</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                <span class="role {{ $user->is_admin ? 'admin' : 'user' }}">
                                    {{ $user->is_admin ? 'Admin' : 'User' }}
                                </span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td class="bcrypt">{{ $user->password }}</td>
                            <td>
                                <span class="status">
                                    <span class="status-dot {{ $user->email_verified_at ? 'active' : 'inactive' }}"></span>
                                    {{ $user->email_verified_at ? 'Actief' : 'Niet actief' }}
                                </span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- PROJECTEN -->
        <div class="admin-card">
            <h2 class="admin-section-title">Alle projecten</h2>

            <table class="admin-table">
                <thead>
                    <tr>
                        <th>Project</th>
                        <th>Eigenaar</th>
                        <th>Email</th>
                        <th>Aangemaakt</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                        <tr>
                            <td>{{ $project->name }}</td>
                            <td>{{ $project->user->name ?? '-' }}</td>
                            <td>{{ $project->user->email ?? '-' }}</td>
                            <td>{{ $project->created_at->format('d-m-Y') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection
