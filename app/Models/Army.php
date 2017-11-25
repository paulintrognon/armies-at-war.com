<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    protected $table = 'armies';

    public $timestamps = false;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->hasMany('App\Models\User', 'userId');
    }

    public function soldiers()
    {
        return $this->hasMany('App\Models\Soldier', 'userId');
    }
}
