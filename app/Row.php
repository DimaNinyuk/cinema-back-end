<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Row extends Model
{
    //
    protected $fillable = [
        'number',
        'hall_id',
    ];
    public function hall(){
        return $this->belongsTo(Hall::class);
    }
    public function seats()
    {
        return $this->hasMany(Seat::class);
    }
}
