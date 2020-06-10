<?php

namespace App\Http\Controllers;

class EditUserProfileController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return view('profile', [
            'user' => $user
        ]);
    }
}
