<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Reference;
use App\Http\Resources\Reference as ReferenceResource;
use App\User;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class ReferencesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *@param  int  $user_id
     *  @return \App\Http\Resources\Reference
     */
    public function index()
    {
        $reference = Reference::where('user_id',Auth::user()->id)->first();
        return new ReferenceResource($reference);
    }
    public function store(Request $request)
    {

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }


        $this->validator($request->all())->validate();

        $user = User::find($request->user_id);
        $reference = $user->reference;
        $reference->update($request->toArray());

        if ($reference->id){
            return new ReferenceResource($reference);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['sometimes', 'string', 'max:255','min:3'],
            'title' => ['sometimes','required', 'string', 'max:255'],
            'phone' => ['sometimes','required','min:7' ,'numeric'],
            'email' => ['sometimes','required', 'email', 'max:255'],
            'company' => ['sometimes','required', 'string', 'max:255'],
            'address' => ['sometimes','required', 'string', 'max:255'],
            'reference_text' => ['sometimes','nullable','string', 'max:2500'],
            'notes' => ['sometimes','nullable','string', 'max:2500'],
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
