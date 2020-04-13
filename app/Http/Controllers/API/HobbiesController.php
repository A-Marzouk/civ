<?php

namespace App\Http\Controllers\API;

use App\Hobby;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\Hobby as HobbyResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;



class HobbiesController extends Controller
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
        // get skills
        $hobbies = Hobby::where('user_id',Auth::user()->id)->paginate(5);
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

        $this->validator($request->all())->validate();

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
        ])->first();

        return new HobbyResource($hobby);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return  array  $id
     */
    public function destroy($id)
    {
        $hobby = Hobby::where([
            'id' => $id,
        ])->first();

        if($hobby->delete()){
            return ['data' => ['id' => $hobby->id] ];
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'category' => ['required', 'string','max:255','min:3'],
        ]);
    }
}

