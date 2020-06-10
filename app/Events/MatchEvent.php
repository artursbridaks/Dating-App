<?php

namespace App\Events;

use App\User;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MatchEvent
{
    use Dispatchable, SerializesModels;

    public User $authUser;
    public User $user;

    public function __construct(User $authUser, User $user)
    {
        $this->authUser = $authUser;
        $this->user = $user;
    }
}
