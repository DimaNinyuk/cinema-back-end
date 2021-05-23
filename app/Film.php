<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'name',
        'description',
        'release_date',
        'link_trailer',
        'duration',
        'company_id',
        'image_id',
    ];
    public function genrefilms()
    {
        return $this->hasMany(GenreFilm::class);
    }
    public function actorfilms()
    {
        return $this->hasMany(ActorFilm::class);
    }
    public function producerfilms()
    {
        return $this->hasMany(ProducerFilm::class);
    }
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
    public function image(){
        return $this->belongsTo(Image::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
}
