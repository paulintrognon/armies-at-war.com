<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    protected $table = 'armies';

    public $timestamps = false;

    protected $guarded = ['id'];
}
