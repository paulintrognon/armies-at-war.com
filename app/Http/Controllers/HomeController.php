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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CookieJar $cookieJar)
    {
        $jwt = app('jwt')->generate();
        $cookieJar->queue(cookie('shared_cookie', $jwt, 60*24*7, null, 'armies-at-war.dev'));

        return view('home');
    }
}
