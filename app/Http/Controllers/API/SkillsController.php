<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Skill as SkillResource;
use App\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SkillsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *@param  int  $user_id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index()
    {
        // get skills of current user.
        $skills = Skill::where('user_id',Auth::user()->id)->paginate(5);
        return SkillResource::collection($skills);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\Skill
     */
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put')){
            // update
            $skill = Skill::findOrFail($request->id);
            $skill->update($request->toArray());
        }else{
            // add
            $request['user_id'] = $request->user_id;
            $skill =Skill::create($request->toArray());
        }

        if ($skill->id){
            return new SkillResource($skill);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $user_id
     * @return \App\Http\Resources\Skill
     */
    public function show($id)
    {
        $skill = Skill::where([
            'id' => $id,
        ])->first();

        return new SkillResource($skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  array  $id
     */
    public function destroy($id)
    {
        $skill = Skill::where([
            'id' => $id,
        ])->first();

        if($skill->delete()){
            return ['data' => ['id' => $skill->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'percentage' => ['required', 'numeric','min:30', 'max:100'],
        ]);
    }
}
