<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $fillable = [
        'name',
    ];

    public function getUsers() {
        return $this->belongsToMany('App\User');
    }//
}
