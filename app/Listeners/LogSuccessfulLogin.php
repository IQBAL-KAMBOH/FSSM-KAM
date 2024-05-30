<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Auth\Events\Login;
use App\Models\LoginHistory;


class LogSuccessfulLogin
{
    public function handle(Login $event)
    {
        $login_history = new LoginHistory;
        $login_history->user_id = $event->user->id;
        $login_history->user_agent = request()->header('User-Agent');
        $login_history->login_at = now();
        $login_history->save();
    }
}
