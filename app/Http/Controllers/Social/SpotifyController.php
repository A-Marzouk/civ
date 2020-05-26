<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 5/26/2020
 * Time: 11:17 AM
 */

namespace App\Http\Controllers\Social;


use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SpotifyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    //    github provider
    public function redirectToSpotifyProvider()
    {
        return Socialite::driver('spotify')->redirect();
    }
    public function handleSpotifyProviderCallback()
    {
        try {
            $user = Socialite::driver('spotify')->stateless()->user();
            dd($user);
        } catch (Exception $e) {
           abort(404, 'Partner not found');
        }
    }

}
