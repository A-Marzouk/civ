<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class APIController extends Controller
{
    public function __construct()
    {
//        $this->middleware('role:admin');
    }

    public function APIClients(){
        return view('passport.api_clients');
    }
}
