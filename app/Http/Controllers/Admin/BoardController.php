<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends \App\Http\Controllers\Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $board = app('board')->getCurrentBoard();
        if (!$board) {
            return redirect()->route('admin.board.new.index');
        }

        return view('admin.board.index', [
            'board' => $board,
        ]);
    }

    public function createNew()
    {
        return view('admin.board.new');
    }

    public function createPost(Request $request)
    {
        $image = $request->file('boardImage');
        $name = trim($request->name);

        if (!$image || !$name) {
            return redirect()->route('admin.board.new.index');
        }
        $extension = $image->extension();
        if ($extension !== 'png') {
            return redirect()->route('admin.board.new.index');
        }

        app('board')->loadImage($name, $image);

        return redirect()->route('admin.board.index');
    }
}
