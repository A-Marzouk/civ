<?php

namespace App\Http\Controllers;

use App\Http\Resources\Skill as SkillResource;
use App\Skill;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  int  $user_id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index($user_id)
    {
        // get skills
        $skills = Skill::where('user_id',$user_id)->paginate(5);
        // return the collection of skills as a resource:
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
        if($request->isMethod('put')){
            // update
            $skill = Skill::findOrFail($request->id);
            $skill->update($request->toArray());
        }else{
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
    public function show($user_id,$id)
    {
        $skill = Skill::where([
            'id' => $id,
            'user_id' => $user_id
        ])->first();

        return new SkillResource($skill);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  array  $id
     */
    public function destroy($user_id,$id)
    {
        $skill = Skill::where([
            'id' => $id,
            'user_id' => $user_id
        ])->first();

        if($skill->delete()){
            return ['data' => ['id' => $skill->id] ];
        }
    }
}
