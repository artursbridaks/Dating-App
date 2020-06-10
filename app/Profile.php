<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'age', 'bio', 'gender', 'picture_main'
    ];

    public function getPicture()
    {
        if ($this->picture_main == null) {
            return '/storage/picture/default.jpg';
        } elseif (substr($this->picture_main, 0, 4) === "http") {
            return url($this->picture_main);
        }
        return 'storage/' . $this->picture_main;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
