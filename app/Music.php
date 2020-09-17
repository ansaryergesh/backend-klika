<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    protected $fillable = ['singer_id','genre_id', 'name', 'description', 'price'];

    public function singer() {
        return $this->belongsTo(Singer::class);
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }
}
