<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Picture extends Model
{
    protected $fillable = ['gallery'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getUrl(): string
    {
        return Storage::exists($this->gallery) ? Storage::url($this->gallery) : $this->gallery;
    }
}
