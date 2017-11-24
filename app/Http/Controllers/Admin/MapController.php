<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class MapController extends \App\Http\Controllers\Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.map.index');
    }
}
