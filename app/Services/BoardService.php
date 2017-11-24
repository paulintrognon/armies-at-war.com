<?php

namespace App\Services;

use App\Models\Board;
use App\Models\BoardSquare;

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

        $this->generateBoardSquares($fullPath, $board);

        dd($board);
    }

    protected function generateBoardSquares($imagePath, Board $board)
    {
        $image = imagecreatefrompng($imagePath);
        for($x = 0; $x < $board->sizeX; $x++) {
            for($y = 0; $y < $board->sizeY; $y++) {
                $index = imagecolorat($image, $x, $y);
                $color = str_pad(dechex($index), 6, '0', STR_PAD_LEFT);
                $terrain = $this->color2terrain($color);
                $square = new BoardSquare([
                    'x' => $x,
                    'y' => $y,
                    'terrain' => $terrain,
                ]);
                $square->board()->associate($board);
                $square->save();
            }
        }
    }

    protected function color2terrain($color)
    {
        return config('color2terrain')[$color];
    }

    protected function colorIndexToHex($index)
    {
        $r = ($index >> 16) & 0xFF;
        $g = ($index >> 8) & 0xFF;
        $b = $index & 0xFF;
        return dechex($r).dechex($g).dechex($b);
    }
}
