<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


use App\User;

class ResumeController extends Controller
{

    public function themePreview ($themeCode) {
        return view('defaultThemes.' . $themeCode);
    }

    public function userResume ($username) {
        // get user default cv code.
        $user = User::withAllRelations($username);
        if($user){
            // get theme code
            $themeCode = $user->theme_code ;
            return view('userThemes.theme' . $themeCode, compact('user'));
        }else{
            return abort(404);
        }
    }

}
