<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    Protected $fillable = [
    	'user_id', 'grade', 'test_name','description'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
