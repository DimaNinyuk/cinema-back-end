<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    //
    protected $fillable = [
        'img',
    ];
    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function films()
    {
        return $this->hasMany(Film::class);
    }
}
