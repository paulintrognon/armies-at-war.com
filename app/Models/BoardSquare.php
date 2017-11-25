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

    public function data()
    {
        if (!$this->data) {
            return;
        }
        return json_decode($this->data);
    }

    public function getCityData()
    {
        $data = $this->data();
        if (!$data) {
            return [
                'army' => null,
            ];
        }

        $army = $data->armyId ? Army::find($data->armyId) : null;

        return [
            'army' => $army,
        ];
    }
}
