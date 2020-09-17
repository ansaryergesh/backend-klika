<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $fillable = ['name'];

    public function musics()
    {
        return $this->hasMany(Music::class);
    }
}
