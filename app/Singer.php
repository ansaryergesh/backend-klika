<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Singer extends Model
{
    protected $fillable = ['name'];

    public function musics()
    {
        return $this->hasMany(Music::class);
    }
}
