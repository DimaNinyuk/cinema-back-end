<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buying extends Model
{
    //
    protected $fillable = [
        'date',
        'sum',
        'session_id',
        'user_id'
    ];
    public function session(){
        return $this->belongsTo(Session::class);
    }
    public function buyingseats()
    {
        return $this->hasMany(BuyingSeat::class);
    }
}
