<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Logout;
use App\Models\LoginHistory;

class LogSuccessfulLogout
{
    public function handle(Logout $event)
    {
        $login_history = LoginHistory::where('user_id', $event->user->id)
            ->whereNull('logout_at')
            ->orderByDesc('login_at')
            ->first();
        
        if ($login_history) {
            $login_history->logout_at = now();
            $login_history->save();
        }
    }
}
