<?php

namespace App\Console\Commands;

use App\Affection;
use App\Services\Match\AffectionRequest;
use App\Services\Match\AffectionService;
use App\User;
use Illuminate\Console\Command;

class AffectionCommand extends Command
{
    protected $signature = 'affection:make {authUser} {affectionType} {user}';

    protected $description = 'Simulate affections';
    /**
     * @var AffectionService
     */
    private AffectionService $service;

    public function __construct(AffectionService $service)
    {
        parent::__construct();

        $this->service = $service;
    }

    public function handle(): void
    {
        $authUser = $this->argument('authUser');
        $affectionType = $this->argument('affectionType');
        $user = $this->argument('user');

        auth()->loginUsingId($authUser);

        $this->service->execute(
            new AffectionRequest(
                User::find($authUser),
                User::find($user),
                $affectionType
            )
        );
    }
}

