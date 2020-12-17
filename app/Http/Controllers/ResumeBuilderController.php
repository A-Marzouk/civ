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
        $this->middleware(['auth','role:agent|admin']); // TODO: out back the subscribed middleware.
    }

    // we will allow even admin to have a resume-builder account

    public function index(){
        $is_admin = false ;
        if(Auth::user()->hasRole('admin')){
            $is_admin = true;
        }
        return view('resume_builder.index', compact('is_admin'));
    }

}
