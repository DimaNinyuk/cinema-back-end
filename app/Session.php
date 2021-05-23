<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $fillable = [
        'date',
        'time',
        'price',
        'hall_id',
        'film_id',
    ];
    public function hall(){
        return $this->belongsTo(Hall::class);
    }
    public function film(){
        return $this->belongsTo(Film::class);
    }
    public function buyings()
    {
        return $this->hasMany(Buying::class);
    }
}
