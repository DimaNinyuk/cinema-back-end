<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hall extends Model
{
    //
    protected $fillable = [
        'name',
        'type_id',
    ];
    public function type(){
        return $this->belongsTo(Type::class);
    }
    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
    public function rows()
    {
        return $this->hasMany(Row::class);
    }
}
