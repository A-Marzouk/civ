<?php

namespace App\Http\Controllers\API;

use App\Hobby;
use App\User;
use Exception;
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
        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != ''){
            // update
            $hobby = Hobby::findOrFail($request->id);
            $hobby->update($request->toArray());
        }else{
            $request['resume_link_id'] = User::find($request->user_id)->resume_link_id;
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


    public function updateHobbiesOrder(Request $request){
        $hobbies = $request->hobbies ;
        foreach ($hobbies as $key => $hobby){
            $myHobby = Hobby::find($hobby['id']);
            $myHobby->update([
                'order' => $key + 1
            ]);
        }
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

        if(!is_auth($hobby)){
            throw new Exception('Not Authenticated!');
        }

        if($hobby->delete()){
            return ['data' => ['id' => $hobby->id] ];
        }
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['sometimes', 'string', 'max:255','min:3'],
            'category' => ['sometimes', 'string','max:255','min:3'],
        ]);
    }


}

