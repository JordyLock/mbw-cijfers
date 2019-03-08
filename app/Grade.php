<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    Protected $fillable = [
    	'user_id', 'subject', 'grade', 'test_name','description'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
