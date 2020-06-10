<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Affection extends Model
{
    const TYPE_LIKE = 'like';
    const TYPE_DISLIKE = 'dislike';

    protected $fillable = ['affection_to', 'affection_type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function affected()
    {
        return $this->belongsTo(User::class, 'affection_to', 'id');
    }
}
