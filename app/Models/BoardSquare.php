<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BoardSquare extends Model
{
    protected $table = 'boardSquares';

    public $timestamps = false;

    protected $guarded = ['id', 'data'];

    public function board()
    {
        return $this->belongsTo('App\Models\Board', 'boardId');
    }

    public function terrain()
    {
        return $this->belongsTo('App\Models\Terrain', 'terrainId');
    }
}
