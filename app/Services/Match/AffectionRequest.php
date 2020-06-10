<?php

namespace App\Services\Match;

use App\User;

class AffectionRequest
{
    private User $authUser;
    private User $user;
    private string $affectionType;

    public function __construct(
        User $authUser,
        User $user,
        string $affectionType
    )
    {
        $this->authUser = $authUser;
        $this->user = $user;
        $this->affectionType = $affectionType;
    }

    public function authUser(): User
    {
        return $this->authUser;
    }

    public function user(): User
    {
        return $this->user;
    }

    public function affectionType(): string
    {
        return $this->affectionType;
    }
}
