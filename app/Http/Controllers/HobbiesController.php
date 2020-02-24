<?php

namespace App\Http\Controllers;

use App\Hobby;
use Illuminate\Http\Request;
use App\Http\Resources\Hobby as HobbyResource;


class HobbiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *@param  int  $user_id
     * @return \Illuminate\Http\Resources\Json\ResourceCollection
     */
    public function index($user_id)
    {
        // get skills
        $hobbies = Hobby::where('user_id',$user_id)->paginate(5);
        // return the collection of skills as a resource:
        return HobbyResource::collection($hobbies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Http\Resources\Hobby
     */
    public function store(Request $request)
    {
        if($request->isMethod('put')){
            // update
            $hobby = Hobby::findOrFail($request->id);
            $hobby->update($request->toArray());
        }else{
            $hobby =Hobby::create($request->toArray());
        }

        if ($hobby->id){
            return new HobbyResource($hobby);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @param  int  $user_id
     * @return \App\Http\Resources\Hobby
     */
    public function show($user_id,$id)
    {
        $hobby = Hobby::where([
            'id' => $id,
            'user_id' => $user_id
        ])->first();

        return new HobbyResource($hobby);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  array  $id
     */
    public function destroy($user_id,$id)
    {
        $hobby = Hobby::where([
            'id' => $id,
            'user_id' => $user_id
        ])->first();

        if($hobby->delete()){
            return ['data' => ['id' => $hobby->id] ];
        }
    }
}

