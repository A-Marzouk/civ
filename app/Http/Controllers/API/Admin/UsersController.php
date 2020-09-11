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

    public function giveTestPermission(Request $request){
        $user = User::find($request->user_id);
        if($user->can('test.builder.users')){
            $user->revokePermissionTo('test.builder.users');
        }else{
            $user->givePermissionTo('test.builder.users');
        }

        return $user->permissions;
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
        $this->updateValidator($request->all())->validate();

        $user = User::findOrFail($request->id);

        $user->update($request->only(['username', 'name' , 'email']));

        return [
            'status' => 'success',
            'user' => $user,
        ];
    }

    public function deleteUser($id){
        $user = User::where([
            'id' => $id,
        ])->first();

        if($user->delete()){
            return ['data' => ['id' => $id] ];
        }
        else{
            return 'fail';
        }
    }

    public function forceDeleteUser($id){
        $user = User::withTrashed()->where([
            'id' => $id,
        ])->first();

        if($user->forceDelete()){
            return ['data' => ['id' => $id] ];
        }
        else{
            return 'fail';
        }
    }


    public function restoreUser(Request $request){
      return User::withTrashed()
            ->where('id', $request->id)
            ->restore();
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'. $data['id'].',id',
            'username' => 'required|alpha_dash|unique:users,username,'. $data['id'].',id',
            'password' => 'sometimes|string|min:6|confirmed',
        ]);
    }

    protected function updateValidator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'. $data['id'].',id',
            'username' => 'required|alpha_dash|unique:users,username,'. $data['id'].',id',
        ]);
    }

}
