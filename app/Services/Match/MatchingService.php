<?php

namespace App\Services\Match;

use App\User;

class MatchingService
{
    public function execute(MatchingRequest $request): ?User
    {
        return $request->user()
            ->filterAge()
            ->filterGender()
            ->filterAffection()
            ->inRandomOrder()
            ->first();
    }
}
