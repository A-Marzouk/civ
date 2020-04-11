<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResumeBuilderController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:agent'])->except('editAccountData','validateSingleField');
    }

    public function index(){
        return view('resume_builder.index');
    }

}
