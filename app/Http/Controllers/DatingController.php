<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\EventDispatcher\Event;

class DatingController extends Controller
{
    public function __invoke()
    {
    }

    public function matching()
    {
        /** @var User $authUser */
        $authUser = auth()->user();
        $users = $authUser->filterAffection()->inRandomOrder()->first();

        return view('dating', [
            'users' => $users
        ]);
    }

    public function likeUser(User $user)
    {
        $this->affect($user, 'like');

        return redirect()->back();
    }

    public function dislikeUser(User $user)
    {
        $this->affect($user, 'dislike');

        return redirect()->back();
    }

    private function affect(User $user, string $affectionType)
    {
        /** @var User $authUser */
        $authUser = auth()->user();

        $affection = $authUser->affections()
            ->where('affection_to', $user->id)
            ->exists();

        if ($affection === true) {
            throw new \InvalidArgumentException('There is already an affection');
        }

        $affection = $authUser->affections()->create([
            'affection_to' => $user->id,
            'affection_type' => $affectionType
        ]);
    }
}

//class DatingController extends Controller
//{
//    public function __invoke()
//    {
////        $users = User::all()->random(1);
////        $users = User::all()->random(1)->except(User::class);
//        $users = User::all()->random(1)->except(Auth::id());
//
//        return view('dating', [
//            'users' => $users
//        ]);
//    }
//}
