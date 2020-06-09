<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\BuilderURL;
use App\Http\Controllers\Controller;
use App\Http\Resources\BuilderURL as BuilderURLResource;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BuilderURLController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
        $resumeBuilderURL = BuilderURL::where('user_id',Auth::user()->id);
        return BuilderURLResource::collection($resumeBuilderURL);
    }


    public function store(Request $request)
    {
        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $resumeBuilderURL = BuilderURL::findOrFail($request->id);
            $resumeBuilderURL->update($request->toArray());
        }else{
            $resumeBuilderURL = BuilderURL::create($request->toArray());
        }

        if ($resumeBuilderURL->id){
            return new BuilderURLResource($resumeBuilderURL);
        }
    }


    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:255,min:3|unique:users,username,'. $data['id'].',id',
            'label' => ['required','string','max:255','min:3'],
        ]);
    }
}
