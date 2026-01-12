<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Admin\AdminProjectController;
use App\Http\Middleware\TrackUserOnline;

Route::middleware([TrackUserOnline::class])->group(function () {

    Route::get('/', function () {
        return redirect()->route('dashboard');
    });

    Route::middleware(['auth'])->group(function () {

        /*
        |--------------------------------------------------------------------------
        | User routes
        |--------------------------------------------------------------------------
        */

        Route::get('/dashboard', [DashboardController::class, 'index'])
            ->name('dashboard');

        Route::resource('projects', ProjectController::class);

        Route::get('/profile', [ProfileController::class, 'edit'])
            ->name('profile.edit');

        Route::patch('/profile', [ProfileController::class, 'update'])
            ->name('profile.update');

        Route::delete('/profile', [ProfileController::class, 'destroy'])
            ->name('profile.destroy');

        Route::post('/heartbeat', function () {
            return response()->json(['status' => 'ok']);
        })->middleware('auth')->name('heartbeat');


        /*
        |--------------------------------------------------------------------------
        | Admin routes
        |--------------------------------------------------------------------------
        */

        Route::middleware(['admin'])
            ->prefix('admin')
            ->name('admin.')
            ->group(function () {

                Route::get('/dashboard', [AdminDashboardController::class, 'index'])
                    ->name('dashboard');

                Route::get('/projects', [AdminProjectController::class, 'index'])
                    ->name('projects.index');

                Route::get('/projects/{project}', [AdminProjectController::class, 'show'])
                    ->name('projects.show');

                Route::get('/projects/{project}/edit', [AdminProjectController::class, 'edit'])
                    ->name('projects.edit');

                Route::put('/projects/{project}', [AdminProjectController::class, 'update'])
                    ->name('projects.update');

                Route::delete('/projects/{project}', [AdminProjectController::class, 'destroy'])
                    ->name('projects.destroy');
            });

    });

});

require __DIR__ . '/auth.php';
