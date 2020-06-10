<?php

namespace App\Http\Controllers;


//use Illuminate\Foundation\Auth\User;
//use http\Client\Curl\User;
use App\User;

class UserGalleryController extends Controller
{

    public function __invoke()
    {
        return view('user-gallery');
    }

    public function userPictures(User $user)
    {
        $gallery = $user->pictures()->get();

        return view('user-gallery', [
            'user' => $user,
            'gallery' => $gallery
        ]);
    }


}
