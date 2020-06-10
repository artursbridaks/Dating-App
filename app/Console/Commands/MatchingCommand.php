<?php

namespace App\Console\Commands;

use App\Services\Match\MatchingRequest;
use App\Services\Match\MatchingService;
use App\User;
use Illuminate\Console\Command;

class MatchingCommand extends Command
{
    protected $signature = 'match {user}';

    protected $description = 'Command description';
    /**
     * @var MatchingService
     */
    private MatchingService $matchingService;

    public function __construct(MatchingService $matchingService)
    {
        parent::__construct();
        $this->matchingService = $matchingService;
    }

    public function handle()
    {
        $user = User::find($this->argument('user'));
        $possibleMatch = $this->matchingService->execute(
            new MatchingRequest($user)
        );

        echo sprintf(
            'Do you like? %s : %s : %s : %s',
            (string)$possibleMatch->id,
            (string)$possibleMatch->name,
            (string)$possibleMatch->profile->age,
            (string)$possibleMatch->gender,
        ) . PHP_EOL;

        return 1;
    }
}
