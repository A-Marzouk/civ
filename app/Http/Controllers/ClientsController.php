<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 12/16/2020
 * Time: 2:49 PM
 */

namespace App\Http\Controllers;


class ClientsController extends Controller
{

    public function __construct(){
        $this->middleware(['auth','role:client']);
    }

    public function index(){
        return view('client.dashboard');
    }

}