<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Exception;
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

    public function index()
    {

        // get workExperience
        $workEx = WorkEx::where('user_id',Auth::user()->id)->paginate(5);
        // return the collection of workExperience as a resource:
        return WorkExResource::collection($workEx);
    }

    public function store(Request $request)
    {

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != ''){
            // update
            $workEx = WorkEx::findOrFail($request->id);
            $workEx->update($request->toArray());
        }else{
            // add
            $workEx = WorkEx::create($request->toArray());
        }

        if ($workEx->id){
            return new WorkExResource($workEx);
        }
    }

   public function storeMany(Request $request)
    {
        foreach ($request->toArray() as $work){
            $this->validator($work)->validate();
            WorkEx::create($work);
        }

        return ['status' =>'success'];

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
        ])->first();

        return new WorkExResource($workEx);
    }


    public function destroy($id)
    {
        $workEx = WorkEx::where([
            'id' => $id,
        ])->first();

        if(!$this->is_auth($workEx)){
            throw new Exception('Not Authenticated!');
        }

        if($workEx->delete()){
            return ['data' => ['id' => $workEx->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'company_name' => ['sometimes','required','string','max:255'],
            'job_title' => ['sometimes','string','max:255'],
            'description' => ['sometimes','string','max:2500'],
            'website' => ['sometimes','nullable','string','max:255'],
            'date_from' => ['sometimes','date','max:255'],
            'date_to' => ['sometimes','nullable','date','max:255'],
            'present' =>['boolean'],
            'order' =>['max:255'],
            'category' =>['max:255'],
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
