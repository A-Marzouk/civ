<?php

namespace App\Http\Controllers\API;

use App\Education;
use App\Http\Controllers\Controller;
use App\Http\Resources\Education as EducationResource;
use Illuminate\Http\Request;
use Exception;
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

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') ||  $request->id != ''){
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


    public function updateEducationOrder(Request $request){
        $educations = $request->educations ;
        foreach ($educations as $key => $education){
            $myEducation = Education::find($education['id']);
            $myEducation->update([
                'order' => $key + 1
            ]);
        }
    }


    public function storeMany(Request $request)
    {
        foreach ($request->toArray() as $education){
            $this->validator($education)->validate();
            Education::create($education);
        }

        return ['status' =>'success'];

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

        if(!$this->is_auth($education)){
            throw new Exception('Not Authenticated!');
        }

        if($education->delete()){
            return ['data' => ['id' => $education->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'institution_type' => ['sometimes','string','max:255','min:3'],
            'university_name' => ['sometimes','string','max:255','min:3'],
            'degree_title' => ['sometimes','string','max:2500','min:3'],
            'date_from' => ['sometimes','date','max:255','min:3'],
            'date_to' => ['sometimes','nullable','date','max:255'],
            'present' =>['boolean']
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
