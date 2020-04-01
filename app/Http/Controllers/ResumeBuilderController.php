<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ResumeBuilderController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:agent');
    }

    public function index(){
        return view('resume_builder.index');
    }

    public function editAccountData(Request $request){
        $request->validate([
            'name' => 'nullable|max:191|min:3',
            'email'     => 'nullable|max:191|email',
            'password' => 'nullable|min:6|max:191|confirmed',
            'username' => 'nullable|min:3|max:191',
        ]);


        $user = auth()->user();


        if (isset($request->username)) {
            $user->update([
                'username' => $request->username
            ]);
        }

        if (isset($request->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if (isset($request->name)) {
            $user->update([
                'name' => $request->name
            ]);
        }

        if (isset($request->email) && $request->email !== null ) {
            $user->update([
                'email' => $request->email
            ]);
        }

        return $user;
    }

    public function validateSingleField(Request $request){
        $request->validate([
            'name' => 'min:3|max:191',
            'email'     => 'max:191|email',
            'password' => 'nullable|min:6|max:191|confirmed',
            'username' => 'min:3|max:191|unique:users',
        ]);

        return 'success';
    }

}
