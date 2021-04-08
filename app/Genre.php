<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    public function genrefilms()
    {
        return $this->hasMany(GenreFilm::class);
    }
}
