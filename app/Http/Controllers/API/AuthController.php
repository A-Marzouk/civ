<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/25/2020
 * Time: 12:31 AM
 */

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public $successStatus = 200;
    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){

        $attempt = Auth::attempt(['email' => request('email'), 'password' => request('password')]);

        if($attempt){
            $user = Auth::user();

            $success['access_token'] =  $user->createToken('My-App')->accessToken;
            $success['user'] =  $user;

            return response()->json(['success' => $success], $this->successStatus);
        }

        return response()->json(['error'=>'Unauthorised'], 401);
    }
    /**
     * Register api
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('agent');

        $success['access_token'] =  $user->createToken('My-App')-> accessToken;
        $success['user'] =  $user;

        return response()->json(['success'=>$success], $this-> successStatus);
    }
    /**
     * details api
     *
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this-> successStatus);
    }


    /**
     * lougut api
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if (Auth::check()) {
            Auth::user()->token()->revoke();
            return response()->json(['success' => 'Logged out', 'access_token' => Auth::user()->token()], $this-> successStatus);
        }
    }
}
