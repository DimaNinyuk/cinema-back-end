<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProducerFilm extends Model
{
    //
    protected $fillable = [
        'film_id',
        'producer_id',
    ];
    public function film(){
        return $this->belongsTo(Film::class);
    }
    public function producer(){
        return $this->belongsTo(Producer::class);
    }
}
