<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class Controller extends \App\Http\Controllers\Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }
}
