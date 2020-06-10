<?php

use App\Picture;
use App\Profile;
use App\User;
use Illuminate\Database\Seeder;

class AppSeeder extends Seeder
{
    public function run(): void
    {
        $users = factory(\App\User::class, 100)->create()
            ->each(function (User $user) {
                $user->profile()->save(
                    factory(Profile::class)->make()
                );
            });

        foreach ($users as $user) {
            $user->save();

            $this->generatePictures($user, rand(1, 5));
        }
    }

    private function generatePictures(User $user, int $amount = 1)
    {
        factory(Picture::class, $amount)->make()
            ->each(function (Picture $picture) use ($user) {
                $picture->user()->associate($user);
                $picture->save();
            });
    }
}
