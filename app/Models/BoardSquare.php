<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardSquare extends Model
{
    protected $table = 'boardSquares';

    protected $guarded = ['id', 'data'];
}
