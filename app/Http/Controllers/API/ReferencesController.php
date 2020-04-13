<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Reference;
use App\Http\Resources\Reference as ReferenceResource;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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
        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            $reference = Reference::find($request->id);
            $reference->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $reference = Reference::create($request->toArray());
        }

        if ($reference->id){
            return new ReferenceResource($reference);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255','min:3'],
            'title' => ['sometimes','required', 'string', 'max:255'],
            'phone' => ['sometimes','required','min:7' ,'numeric'],
            'email' => ['sometimes','required', 'email', 'max:255'],
            'company' => ['sometimes','required', 'string', 'max:255'],
            'address' => ['sometimes','required', 'string', 'max:255'],
            'reference_text' => ['sometimes','nullable','string', 'max:2500'],
            'notes' => ['sometimes','nullable','string', 'max:2500'],
        ]);
    }
}
