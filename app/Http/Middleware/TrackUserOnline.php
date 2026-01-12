<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class TrackUserOnline
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            Cache::put(
                'user-is-online-' . auth()->id(),
                true,
                now()->addMinutes(5)
            );
        }

        return $next($request);
    }
}
