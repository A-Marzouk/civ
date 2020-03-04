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
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Client;

class AuthController extends Controller
{
    public $successStatus = 200;

    public function __construct()
    {
        $this->middleware('auth:api')->except('register'); // user already received the access_token - he can login / logout
    }

    /**
     * login api
     *
     * @return \Illuminate\Http\Response
     */
    public function login(){

        if(Auth::check()){
            return response()->json(['user' => Auth::user()], $this->successStatus);
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
        // check client_id and client_secret as first step:
        if($request->client_id){
            $client = Client::where('id',$request->client_id)->first();
        }else{
            return response()->json(['error'=> 'Wrong client credentials - No client ID provided.'], 401);
        }

        if($request->client_secret === $client->secret && !$client->revoked){
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
            $success['access_token'] = $user->createToken($user->name. '| USER ID:' . $user->id)->accessToken;
            $success['user'] =  $user;
            return response()->json(['success'=>$success], $this-> successStatus);
        }else{
            return response()->json(['error'=> 'Wrong client credentials.'], 401);
        }
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
