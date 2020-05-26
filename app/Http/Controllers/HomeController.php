<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function welcome()
    {
        return view('welcome');
    }

    public function pricing()
    {
        return view('pricing');
    }

    public function docs()
    {
        return view('api.docs');
    }


    public function privacy()
    {
        return view('contracts.privacy');
    }

    public function terms()
    {
        return view('contracts.terms');
    }
}
