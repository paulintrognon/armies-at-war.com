<?php

namespace App\Services;

use App\Models\Board;

class BoardService {

    public function getCurrentBoard()
    {
        return Board::where('isActive', true)->first();
    }

    public function loadImage($name, $image)
    {
        $path = 'app/'.$image->store('images');
        $fullPath = storage_path($path);

        $imageMeta = getimagesize($fullPath);
        $sizeX = $imageMeta[0];
        $sizeY = $imageMeta[1];

        $board = Board::create([
            'name' => $name,
            'sizeX' => $sizeX,
            'sizeY' => $sizeY,
            'path' => $path,
        ]);
        dd($board);
    }
}
