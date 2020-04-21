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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function user($id = '')
    {
        if(!empty($id)){
            $user_id = $id ;
        }else{
            $user_id = Auth::user()->id;
        }
        $user = User::where('id',$user_id)->with([
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
            'availabilityInfo',
            'summary',
        ])->first();
        if($user){
            return response()->json($user, 200);
        }
        return response()->json(['Error' => "Something went wrong."], 404);
    }

    public function updateUserTheme(Request $request){
        Auth::user()->update(
            ['theme_code' => $request->theme_code]
        );

        return ['status' => 'success'];
    }

    public function editAccountData(Request $request){
        $request->validate([
            'name' => 'nullable|max:191|min:3',
            'email'     => 'nullable|max:191|email',
            'password' => 'nullable|min:6|max:191|confirmed',
            'username' => 'nullable|min:3|max:191',
        ]);


        $user = User::find($request->id);


        if (isset($request->username)) {
            $user->update([
                'username' => $request->username
            ]);
        }

        if (isset($request->password)) {
            $user->update([
                'password' => Hash::make($request->password)
            ]);
        }

        if (isset($request->name)) {
            $user->update([
                'name' => $request->name
            ]);
        }

        if (isset($request->email) && $request->email !== null ) {
            $user->update([
                'email' => $request->email
            ]);
        }

        return $user;
    }

    public function validateSingleField(Request $request){
        $request->validate([
            'name' => 'min:3|max:191',
            'email'     => 'max:191|email',
            'password' => 'nullable|min:6|max:191|confirmed',
            'username' => 'min:3|max:191|unique:users',
        ]);

        return 'success';
    }

    public function updateLastActivity(Request $request){
        if (Auth::user()->hasRole('admin')){
            Auth::user()->updateLastActivity();
        }else{
            $user = User::find($request->user_id);
            $user->updateLastActivity();
            return ['status' => 'success'];
        }
    }

}
