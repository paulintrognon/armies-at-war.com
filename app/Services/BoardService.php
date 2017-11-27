<?php

namespace App\Services;

use App\Models\Board;
use App\Models\BoardSquare;
use App\Models\Terrain;

class BoardService {

    public function getCurrentBoard()
    {
        return Board::where('isActive', true)->first();
    }

    public function loadImage($name, $image)
    {
        $path = $image->store('public/images/boards');
        $fileName = explode('/', $path)[3];
        $fullPath = storage_path('app/'.$path);

        $imageMeta = getimagesize($fullPath);
        $sizeX = $imageMeta[0];
        $sizeY = $imageMeta[1];

        $board = Board::create([
            'name' => $name,
            'sizeX' => $sizeX,
            'sizeY' => $sizeY,
            'path' => "storage/images/boards/$fileName",
        ]);

        $this->generateBoardSquares($fullPath, $board);
    }

    protected function generateBoardSquares($imagePath, Board $board)
    {
        $terrains = [];
        foreach (Terrain::all() as $terrain) {
            $terrains[$terrain->color] = $terrain->id;
        };

        $image = imagecreatefrompng($imagePath);
        for($x = 0; $x < $board->sizeX; $x++) {
            $squaresToInsert = [];

            for($y = 0; $y < $board->sizeY; $y++) {

                $color = $this->getHexColor($image, $x, $y);
                if (!isset($terrains[$color])) {
                    throw new Exception("No terrain found for color $color", 1);
                }

                $terrain = $terrains[$color];

                $squaresToInsert[] = [
                    'x' => $x,
                    'y' => $y,
                    'boardId' => $board->id,
                    'terrainId' => $terrain,
                    'y' => $y,
                ];
            }

            BoardSquare::insert($squaresToInsert);
        }
    }

    protected function getHexColor($image, $x, $y)
    {
        $index = imagecolorat($image, $x, $y);
        return str_pad(dechex($index), 6, '0', STR_PAD_LEFT);
    }
}
