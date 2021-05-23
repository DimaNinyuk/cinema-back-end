<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActorFilm extends Model
{
    //
    protected $fillable = [
        'film_id',
        'actor_id',
    ];
    public function film(){
        return $this->belongsTo(Film::class);
    }
    public function actor(){
        return $this->belongsTo(Actor::class);
    }
}
