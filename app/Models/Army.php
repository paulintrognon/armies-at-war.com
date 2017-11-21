<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Army extends Model
{
    protected $table = 'armies';

    public $timestamps = false;

    protected $guarded = ['id'];
}
