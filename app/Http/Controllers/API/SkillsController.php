<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\Skill as SkillResource;
use App\Skill;
use Exception;
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

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != ''){
            // update
            $skill = Skill::findOrFail($request->id);
            $skill->update($request->toArray());
        }else{
            // add
            $skill =Skill::create($request->toArray());
        }

        if ($skill->id){
            return new SkillResource($skill);
        }
    }

    public function storeMany(Request $request)
    {
        if(Skill::insert($request->toArray())){
           return ['status' =>'success'];
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

    public function destroy($id)
    {
        $skill = Skill::where([
            'id' => $id,
        ])->first();

        if(!$this->is_auth($skill)){
            throw new Exception('Not Authenticated!');
        }

        if($skill->delete()){
            return ['data' => ['id' => $skill->id] ];
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['sometimes', 'string', 'max:255','min:2'],
            'percentage' => ['sometimes', 'numeric','min:30', 'max:100'],
        ]);
    }

    public function updateSkillsOrder(Request $request){
        $skills = $request->skills ;
        foreach ($skills as $key => $skill){
            $mySkill = Skill::find($skill['id']);
            $mySkill->update([
                'order' => $key + 1
            ]);
        }
    }


    public function toggleVisibility(Request $request){
        $skill   = Skill::find($request->id);
        if($skill){
            $skill->update([
                'is_public' => !$skill->is_public
            ]);
        }
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
