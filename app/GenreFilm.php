<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreFilm extends Model
{
    //
    protected $fillable = [
        'film_id', 'genre_id',
    ];
    public function film(){
        return $this->belongsTo(Film::class);
    }
    public function genre(){
        return $this->belongsTo(Genre::class);
    }
}
