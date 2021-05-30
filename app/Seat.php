<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seat extends Model
{
    //
    protected $fillable = [
        'number',
        'row_id',
    ];
    public function row(){
        return $this->belongsTo(Row::class);
    }
    public function buyingseats()
    {
        return $this->hasMany(BuyingSeat::class);
    }
}
