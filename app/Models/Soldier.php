<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soldier extends Model
{
    protected $table = 'soldiers';

    protected $guarded = ['id'];
}
