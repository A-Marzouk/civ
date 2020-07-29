<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/27/2020
 * Time: 10:13 PM
 */

namespace App\Http\Controllers\API;


use App\Http\Controllers\Controller;
use App\Tab;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api')->except('validateUsername');
    }

    public function user(Request $request)
    {
        $user_id = $request->get('user_id') ;
        if($user_id){
            $id = $user_id;
        }
        else{
            $id = Auth::user()->id;
        }

        $user = User::where('id',$id)->with(User::$defaultRelations)->first();
        if($user){
            $this->setDefaultTabs($user);
            return response()->json($user, 200);
        }
        return response()->json(['Error' => "Something went wrong."], 404);
    }

    protected function setDefaultTabs($user){
        if(count($user->tabs) > 0){
            return true;
        }
        return Tab::insert([
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'work_experience',
                'label' => 'Work Experience'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'education',
                'label' => 'Education'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'skills',
                'label' => 'Skills'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'portfolio',
                'label' => 'Portfolio'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'about_me',
                'label' => 'About Me'
            ],
            [
                'user_id' => $user->id,
                'order' => 1,
                'is_public' => true,
                'title' => 'media',
                'label' => 'Media'
            ]
        ]);
    }


    public function updateUserTheme(Request $request){

        Auth::user()->update(
            ['theme_id' => $request->theme_id]
        );

        return ['status' => 'success'];
    }


    public function editAccountData(Request $request){
        $request->validate([
            'name' => 'required|max:191|min:3',
            'email'     => 'required|max:191|email',
            'password' => 'nullable|min:6|max:191|confirmed',
            'username' => 'required|min:3|max:191',
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
