<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Cookie\CookieJar;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CookieJar $cookieJar)
    {
        if (\Auth::check()) {
            $jwt = app('jwt')->generate();
            $cookieJar->queue(cookie('shared_cookie', $jwt, 60*24*7, null, 'armies-at-war.dev'));

            return view('logged.home');
        }

        return view('home');
    }
}
