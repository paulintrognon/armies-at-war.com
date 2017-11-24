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
        return view('admin.board.index');
    }
}
