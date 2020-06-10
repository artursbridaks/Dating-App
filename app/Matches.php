<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    protected $fillable = ['user_id','matched_to'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
