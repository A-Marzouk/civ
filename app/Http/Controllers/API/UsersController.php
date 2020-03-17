<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/27/2020
 * Time: 10:13 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function user()
    {
        $user = User::where('id',Auth::user()->id)->with([
            'skills',
            'hobbies',
            'education',
            'workExperience',
            'links',
            'projects.images',
            'achievements',
            'media',
            'reference',
            'referee',
            'testimonials',
            'imports',
            'languages',
            'personalInfo',
            'paymentInfo',
            'summary',
        ])->first();
        if($user){
            return response()->json($user, 200);
        }
        return response()->json(['Error' => "Something went wrong."], 404);
    }

}
