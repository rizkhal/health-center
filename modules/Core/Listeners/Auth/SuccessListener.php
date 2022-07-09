<?php

namespace Modules\Core\Listeners\Auth;

class SuccessListener
{
    public function handle($event)
    {
        $event->user->update(['last_logged_in_at' => now()]);
    }
}
