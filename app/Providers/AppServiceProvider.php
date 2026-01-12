<?php

namespace App\Providers;

use Illuminate\Auth\Events\Logout;
use App\Listeners\ClearUserOnlineStatus;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    protected $listen = [
        Logout::class => [
            ClearUserOnlineStatus::class,
        ],
    ];
}
