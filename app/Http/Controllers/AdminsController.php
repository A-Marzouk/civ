<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/24/2020
 * Time: 10:39 AM
 */

namespace App\Http\Controllers;


use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware(['auth','role:admin']);
    }

    public function index(){
        // get all users:
        $users = User::all();
        foreach ($users as $user){
            $user['is_admin'] = $user->hasRole('admin');
        }
        return view('admin.dashboard', compact('users'));
    }

    public function userFullEdit($username){
        $tempUser = User::withAllRelations($username);
        if(!$tempUser){
            return redirect('/workforce-admin');
        }

        $is_admin = false ;

        if(Auth::user()->hasRole('admin')){
            $is_admin = true;
        }

        return view('admin.resume-builder',compact('tempUser','is_admin'));
    }
}
