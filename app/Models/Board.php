<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $table = 'boards';

    protected $guarded = ['id'];

    public function cities()
    {
        return $this->squares()->whereHas('terrain', function ($query) {
            $query->where('slug', 'city');
        });
    }

    public function squares()
    {
        return $this->hasMany('App\Models\BoardSquare', 'boardId');
    }
}
