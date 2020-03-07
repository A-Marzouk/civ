<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 1/27/2020
 * Time: 1:52 PM
 */

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\User;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Validator;


class SocialSitesRegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest');
    }


    public function simpleRegister(Request $request)
    {
        $this->validator($request->all())->validate();

         $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ])->assignRole('agent');

         $token =  $user->createToken($user->name. '| USER ID:' . $user->id)->accessToken;
         auth()->login($user);

        return [
            'status' => 'success',
            'access_token' => $token
        ];
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'username' => $data['email'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ])->assignRole('agent');
    }



    private function findOrCreateUser($user,$provider)
    {

        if ($authUser = User::where($provider.'_id', $user->id)->first()) {
            return $authUser;
        }

        if ($authUser = User::where('email', $user->email)->first()) {
            return $authUser;
        }

        if ($authUser = User::where('username',$user->user['username'] ?? '' )->first()) {
            return $authUser;
        }

        $user = User::create([
            'email' => $user->email ?? $user->user['username'],
            'username' => $user->email ?? $user->user['username'],
            $provider.'_id' => $user->id
        ])->assignRole('agent');


        return $user;
    }


    //    github provider
    public function redirectToGitHubProvider()
    {
        return Socialite::driver('github')->redirect();
    }
    public function handleGitHubProviderCallback()
    {
        try {
            $user = Socialite::driver('github')->user();
        } catch (Exception $e) {
            return Redirect::to('/register/github');
        }

        $authUser = $this->findOrCreateUser($user,'github');

        $token = $authUser->createToken($authUser->name. '| USER ID:' . $authUser->id)->accessToken;
        auth()->login($authUser);
        return Redirect::to('/resume-builder')->withCookie(cookie('access_token',$token,1577000,null, null, false, false )); // 3 years
    }

    //    google provider
    public function redirectToGoogleProvider()
    {
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (Exception $e) {
            return Redirect::to('/register/google');
        }

        $authUser = $this->findOrCreateUser($user,'google');


        $token = $authUser->createToken($authUser->name. '| USER ID:' . $authUser->id)->accessToken;
        auth()->login($authUser);
        return Redirect::to('/resume-builder')->withCookie(cookie('access_token',$token,1577000,null, null, false, false )); // 3 years

    }

    //    linkedin
    public function redirectToLinkedinProvider()
    {
        return Socialite::driver('linkedin')->redirect();
    }
    public function handleLinkedinProviderCallback()
    {
        try {
            $user = Socialite::driver('linkedin')->user();
        } catch (Exception $e) {
            return Redirect::to('/register/linkedin');
        }

        $authUser = $this->findOrCreateUser($user,'linkedin');

        $token = $authUser->createToken($authUser->name. '| USER ID:' . $authUser->id)->accessToken;
        auth()->login($authUser);
        return Redirect::to('/resume-builder')->withCookie(cookie('access_token',$token,1577000,null, null, false, false )); // 3 years
    }


    //    facebook provider
    public function redirectToFaceBookProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFaceBookProviderCallback()
    {
        try {
            $user = Socialite::driver('facebook')->stateless()->user();
        } catch (Exception $e) {
            return Redirect::to('/register/facebook');
        }

        $authUser = $this->findOrCreateUser($user,'facebook');

        $token = $authUser->createToken($authUser->name. '| USER ID:' . $authUser->id)->accessToken;
        auth()->login($authUser);
        return Redirect::to('/resume-builder')->withCookie(cookie('access_token',$token,1577000,null, null, false, false )); // 3 years
    }


//    instagram
    public function redirectToInstagramProvider()
    {
        return Socialite::driver('instagram')->redirect();
    }
    public function handleInstagramProviderCallback()
    {
        try {
            $user = Socialite::driver('instagram')->stateless()->user();
        } catch (Exception $e) {
            return Redirect::to('/register/instagram');
        }

        $authUser = $this->findOrCreateUser($user,'instagram');

        $token = $authUser->createToken($authUser->name. '| USER ID:' . $authUser->id)->accessToken;
        auth()->login($authUser);
        return Redirect::to('/resume-builder')->withCookie(cookie('access_token',$token,1577000,null, null, false, false )); // 3 years
    }




}
