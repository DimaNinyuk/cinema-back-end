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
    public function films()
    {
        return $this->belongsToMany('App\Film', 'genre_films', 'genre_id', 'film_id');
    }
}
