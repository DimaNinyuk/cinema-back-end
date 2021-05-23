<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actor extends Model
{
    //
    protected $fillable = [
        'name',
    ];
    public function actorfilms()
    {
        return $this->hasMany(ActorFilm::class);
    }
}
