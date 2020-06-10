<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class MatchingController extends Controller
{
    public function __invoke()
    {
    }

    public function userMatches()
    {
        /** @var User $authUser */
        $authUser = auth()->user();
//        $users = $authUser->get();

        return view('matches', [
            'users' => $authUser
        ]);
    }

//    public function userMatches()
//    {
//        /** @var User $authUser */
//        $authUser = auth()->user();
//        $users = $authUser->filterMatches()->get();
//
//        return view('matches', [
//            'users' => $users
//        ]);
//    }
}
