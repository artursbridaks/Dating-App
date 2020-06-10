<?php

namespace App\Mail;

use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MatchEmail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private User $user;
    private User $matchedUser;

    public function __construct(User $user, User $matchedUser)
    {
        $this->user = $user;
        $this->matchedUser = $matchedUser;
    }

    public function build()
    {
        return $this->view('dating', [
            'user' => $this->user,
            'matchedUser' => $this->matchedUser,
        ]);
    }
}
