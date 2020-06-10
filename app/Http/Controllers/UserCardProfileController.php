<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Contracts\EventDispatcher\Event;

class UserCardProfileController extends Controller
{
    public function __invoke()
    {
        /** @var User $userCard */
        $userCard = auth()->user();

        $picture = $userCard->profile()->get();

        return view('user-card', [
            'userCard' => $userCard,
            'picture' => $picture
        ]);
    }
}
