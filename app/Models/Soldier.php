<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Soldier extends Model
{
    protected $table = 'soldiers';

    protected $guarded = ['id'];

    public static function create($attributes)
    {
        $attributes['healthPoints'] = 100;
        static::query()->create($attributes);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function army()
    {
        return $this->belongsTo('App\Models\Army');
    }
}
