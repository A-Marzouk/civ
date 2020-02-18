<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function currentUser () {
        return auth()->user();
    }

}
