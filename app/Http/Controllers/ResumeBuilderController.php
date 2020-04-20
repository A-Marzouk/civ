<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ResumeBuilderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        if(Auth::user()->hasRole('admin')){
            return redirect('/workforce-admin');
        }
        return view('resume_builder.index');
    }

}
