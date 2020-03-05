<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\WorkEx;
use App\Http\Resources\WorkEx as WorkExResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WorkExController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {

        // get workExperience
        $workEx = WorkEx::where('user_id',Auth::user()->id)->paginate(5);
        // return the collection of workExperience as a resource:
        return WorkExResource::collection($workEx);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\WorkEx
     */
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $workEx = WorkEx::findOrFail($request->id);
            $workEx->update($request->toArray());
        }else{
            // add
            $request['user_id'] = Auth::user()->id;
            $workEx = WorkEx::create($request->toArray());
        }

        if ($workEx->id){
            return new WorkExResource($workEx);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $user_id
     * @return \App\Http\Resources\WorkEx
     */
    public function show($id)
    {
        $workEx = WorkEx::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        return new WorkExResource($workEx);
    }


    public function destroy($id)
    {
        $workEx = WorkEx::where([
            'id' => $id,
            'user_id' => Auth::user()->id
        ])->first();

        if($workEx->delete()){
            return ['data' => ['id' => $workEx->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['required','string','max:255'],
            'job_title' => ['required','string','max:255'],
            'description' => ['required','string','max:2500'],
            'website' => ['nullable','string','max:255'],
            'date_from' => ['required','date','max:255'],
            'date_to' => ['nullable','date','max:255'],
            'present' =>['boolean']
        ]);
    }
}
