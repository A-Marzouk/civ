<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/27/2020
 * Time: 10:13 PM
 */

namespace App\Http\Controllers\API\Admin;


use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:api', 'role:admin']);
    }


    public function createUser(Request $request){
        $this->validator($request->all())->validate();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ])->assignRole('agent');

        return [
            'status' => 'success',
            'user' => $user,
            'is_admin' => $user->hasRole('admin'),
        ];
    }

    public function updateUser(Request $request){
        $this->validator($request->all())->validate();

        $user = User::findOrFail($request->id);

        $user->update($request->toArray());

        return [
            'status' => 'success',
            'user' => $user,
        ];
    }

    public function deleteUser(Request $request){

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'. $data['id'].',id',
            'username' => 'required|unique:users,username,'. $data['id'].',id',
            'password' => 'sometimes|string|min:6|confirmed',
        ]);
    }


}
