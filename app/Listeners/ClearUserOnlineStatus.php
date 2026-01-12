<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Cache;

class ClearUserOnlineStatus
{
    public function handle(Logout $event): void
    {
        if ($event->user) {
            Cache::forget('user-is-online-' . $event->user->id);
        }
    }
}
