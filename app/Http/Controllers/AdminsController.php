<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/24/2020
 * Time: 10:39 AM
 */

namespace App\Http\Controllers;


use App\User;

class AdminsController extends Controller
{
    public function __construct(){
        $this->middleware('role:admin');
    }

    public function index(){
        // get all users:
        $users = User::all();
        foreach ($users as $user){
            $user['is_admin'] = $user->hasRole('admin');
        }
        return view('admin.dashboard', compact('users'));
    }

}
