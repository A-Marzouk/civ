<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Link;
use App\User;
use Exception;
use App\Http\Resources\Link as LinkResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LinksController extends Controller
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
        $links = Link::where('user_id',Auth::user()->id)->paginate(5);
        return LinkResource::collection($links);
    }

    public function getLinksByCategory($category)
    {
        $links = Link::where([
            ['user_id' , '=', Auth::user()->id],
            ['category' , '=', $category],
        ])->paginate(5);
        return LinkResource::collection($links);
    }

    public function store(Request $request)
    {

        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }


        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != '' ){
            // update
            $link = Link::findOrFail($request->id);
            $link->update($request->toArray());
        }else{
            // add
            $request['resume_link_id'] = User::find($request->user_id)->resume_link_id;
            $link = Link::create($request->toArray());
        }

        if ($link->id){
            return new LinkResource($link);
        }
    }

    public function show($id)
    {
        $link = Link::where([
            'id' => $id,
        ])->first();

        return new LinkResource($link);
    }

    public function destroy($id)
    {
        $link = Link::where([
            'id' => $id,
        ])->first();

        if(!$this->is_auth($link)){
            throw new Exception('Not Authenticated!');
        }


        if($link->delete()){
            return ['data' => ['id' => $link->id] ];
        }
    }

    public function updateLinksOrder(Request $request){
        $links = $request->links ;
        foreach ($links as $key => $link){
            $myLink = Link::find($link['id']);
            $myLink->update([
                'order' => $key + 1
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'link_title' => ['nullable','string', 'max:255','min:3'],
            'category' => ['sometimes', 'string', 'max:255'],
            'link' => ['sometimes', 'string','max:255'],
            'is_active' => ['max:255'],
            'order' => ['max:255'],
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
