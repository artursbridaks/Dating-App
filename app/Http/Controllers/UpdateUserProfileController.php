<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateUserProfileController extends Controller
{
    public function __invoke(Request $request)
    {
        /** @var User $user */
        $user = auth()->user();

        if ($request->hasFile('picture')) {

            Storage::delete($user->profile->picture_main);

            $user->profile->update([
                'picture_main' => $request->file('picture')
                    ->storePublicly('profilePictures'),
            ]);
        }

        $user->update([
            'name' => $request->get('name'),
            'surname' => $request->get('surname'),
            'location' => $request->get('location'),
        ]);

        $user->profile->update([
            'bio' => $request->get('bio'),
            'age' => $request->get('age'),
            'gender' => $request->get('gender'),
        ]);

        return redirect()
            ->back()
            ->with('status', __('Profile has been updated'));
    }
}

