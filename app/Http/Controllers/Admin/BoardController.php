<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Board;

class BoardController extends \App\Http\Controllers\Controller
{
    public function index()
    {
        $board = app('board')->getCurrentBoard();
        if (!$board) {
            return redirect()->route('admin.board.list');
        }
        return view('admin.board.board', [
            'board' => $board,
        ]);
    }

    public function list()
    {
        $boards = Board::all();
        if (!$boards->count()) {
            return redirect()->route('admin.board.new.index');
        }

        return view('admin.board.list', [
            'boards' => $boards,
        ]);
    }

    public function activateBoard($boardId)
    {
        $board = Board::find($boardId);
        if (!$board) {
            abort(404);
        }
        Board::where('isActive', true)->update([
            'isActive' => false
        ]);
        $board->isActive = true;
        $board->save();

        return redirect()->route('admin.board.index');
    }

    public function disactivateBoard($boardId)
    {
        $board = Board::find($boardId);
        if (!$board) {
            abort(404);
        }
        $board->isActive = false;
        $board->save();

        return redirect()->route('admin.board.index');
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
