<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::check()) {
            $jwt = app('jwt')->generate();

            \Cookie::queue('aaw_token', $jwt, 60*24*7, '/', 'armies-at-war.dev');

            return view('logged.home');
        }

        \Cookie::queue('aaw_token', null, -1, '/', 'armies-at-war.dev');;

        return view('home');
    }
}
