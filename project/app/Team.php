<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //Table name
    protected $table = 'teams';

    public function user(){
        return $this->belongsTo('App\user');
    }
    public function games(){
        return $this->hasMany('App\game');
    }
}
