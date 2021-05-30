<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BuyingSeat extends Model
{
    protected $fillable = [
        'buying_id',
        'seat_id',
    ];
    public function seat(){
        return $this->belongsTo(Seat::class);
    }
    public function buying(){
        return $this->belongsTo(Buying::class);
    }
}
