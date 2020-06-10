<?php

namespace App\Services\Match;

use App\Events\MatchEvent;
use App\User;

class AffectionService
{
    public function execute(AffectionRequest $request): void
    {
        $authUser = $request->authUser();

        if ($request->user()->hasMatchWith($request->authUser())) {
            event(new MatchEvent($request->authUser(), $request->user()));
        }

        $authUser->affections()->create([
            'affection_to' => $request->user()->id,
            'affection_type' => $request->affectionType()
        ]);
    }
}
