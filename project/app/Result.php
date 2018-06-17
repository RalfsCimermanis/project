<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'results';

    public function teams()
    {
        return $this->hasMany('App\Team');
    }
}
