<?php

namespace App\Http\Controllers;

use App\Affection;
use App\Services\Match\AffectionRequest;
use App\Services\Match\AffectionService;
use App\Services\Match\MatchingRequest;
use App\Services\Match\MatchingService;
use App\User;

class MatchController extends Controller
{

    private MatchingService $matchingService;
    private AffectionService $service;

    public function __construct(
        MatchingService $matchingService,
        AffectionService $service
    )
    {
        $this->matchingService = $matchingService;
        $this->service = $service;
    }

    public function index()
    {
        return view('matches', [
            'user' => auth()->user()
        ]);
    }

    public function show()
    {
        /** @var User $authUser */
        $authUser = auth()->user();

        $user = $this->matchingService->execute(
            new MatchingRequest($authUser)
        );

        return view('dating', [
            'user' => $user
        ]);
    }

    public function like(User $user)
    {
        $this->service->execute(
            new AffectionRequest(
                auth()->user(),
                $user,
                Affection::TYPE_LIKE
            )
        );

        return redirect()->back();
    }

    public function dislike(User $user)
    {
        $this->service->execute(
            new AffectionRequest(
                auth()->user(),
                $user,
                Affection::TYPE_DISLIKE)
        );

        return redirect()->back();
    }
}
