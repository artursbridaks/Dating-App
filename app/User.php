<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    public const GENDER_MALE = 'Male';
    public const GENDER_FEMALE = 'Female';

    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password', 'surname', 'location'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function pictures()
    {
        return $this->hasMany(Picture::class);
    }

    public function affections()
    {
        return $this->hasMany(Affection::class);
    }

    public function likes()
    {
        return $this->hasMany(Affection::class, 'affection_to', 'id')
            ->where('affection_type', 'like');
    }

    public function scopeFilterGender($query)
    {
        $gender = $this->profile->gender === User::GENDER_FEMALE ? User::GENDER_MALE : User::GENDER_FEMALE;

        $query->whereHas('profile', function ($query) use ($gender) {
            $query->where('gender', $gender);
        });
    }


    public function scopeFilterAffection($query)
    {
        $affections = $this->affections()->pluck('affection_to');

        $query->where('id', '<>', $this->id)
            ->whereNotIn('id', $affections->all());
    }

    public function scopeFilterAge($query)
    {
        $minAge = 18;
        $maxAge = 55;

        $query->whereHas('profile', function ($query) use ($minAge, $maxAge) {
            $query->whereBetween('age', [$minAge, $maxAge]);
        });
    }

    public function hasMatchWith(User $user): bool
    {
        return $this->affections()
            ->where('affection_type', 'like')
            ->where('affection_to', $user->id)
            ->exists();
    }

    public function getMatches()
    {
        $likes = $this->likes()->pluck('user_id');
        return $this->affections()
            ->whereIn('affection_to', $likes)
            ->where('affection_type', 'like')
            ->get();
    }
}

