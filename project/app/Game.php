<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $table = 'games';

    public function teams()
    {
        return $this->hasMany('App\Team');
    }
}
