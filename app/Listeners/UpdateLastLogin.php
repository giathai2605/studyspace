<?php

namespace App\Listeners;

use App\Events\UserAuthenticated;
use Illuminate\Support\Facades\Date;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class UpdateLastLogin
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserAuthenticated $event): void
    {
        Log::info('UserAuthenticated event handled successfully.');

        $event->user->update(['lastLogin' => Date::now()]);
    }
}
