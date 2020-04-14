<?php

namespace App\Http\Controllers\API;

use App\Education;
use App\Http\Controllers\Controller;
use App\Http\Resources\Education as EducationResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class EducationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        // get education
        $education = Education::where('user_id',Auth::user()->id)->paginate(5);
        // return the collection of educations as a resource:
        return EducationResource::collection($education);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\Education
     */
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $education = Education::findOrFail($request->id);
            $education->update($request->toArray());
        }else{
            $education = Education::create($request->toArray());
        }

        if ($education->id){
            return new EducationResource($education);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $user_id
     * @return \App\Http\Resources\Education
     */
    public function show($id)
    {
        $education = Education::where([
            'id' => $id,
        ])->first();

        return new EducationResource($education);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  array  $id
     */
    public function destroy($id)
    {
        $education = Education::where([
            'id' => $id,
        ])->first();

        if($education->delete()){
            return ['data' => ['id' => $education->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'institution_type' => ['required','string','max:255'],
            'university_name' => ['required','string','max:255'],
            'degree_title' => ['required','string','max:2500'],
            'date_from' => ['sometimes','date','max:255'],
            'date_to' => ['sometimes','nullable','date','max:255'],
            'present' =>['boolean']
        ]);
    }
}
