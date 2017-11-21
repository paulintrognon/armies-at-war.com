<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soldier extends Model
{
    protected $table = 'soldiers';

    protected $guarded = ['id'];

    public function army()
    {
        return $this->hasMany('App\Models\Army');
    }
}
