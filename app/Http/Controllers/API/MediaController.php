<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Media;
use Exception;
use App\Http\Resources\Media as MediaResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MediaController extends Controller
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
        $media = Media::where('user_id',Auth::user()->id)->paginate(5);
        return MediaResource::collection($media);
    }


    public function store(Request $request)
    {


        if(!$this->is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != ''){
            // update
            $media = Media::findOrFail($request->id);
            $media->update($request->toArray());
        }else{
            // add
            $media = Media::create($request->toArray());

            if($request->hasfile('mediaFile')) {

                $path = Upload::media($request);
                if($path){
                    $media->update([
                        'url' => $path
                    ]);
                }else{
                    return $path;
                }

            }

        }

        if ($media->id){
            return new MediaResource($media);
        }
    }

    public function show($id)
    {
        $media = Media::where([
            'id' => $id,
        ])->first();

        return new MediaResource($media);
    }

    public function destroy($id)
    {
        $media = Media::where([
            'id' => $id,
        ])->first();


        if(!$this->is_auth($media)){
            throw new Exception('Not Authenticated!');
        }

        // remove media from the system if the file exists
        if ($media->url && file_exists(public_path($media->url))) {
            unlink(public_path($media->url));
        }

        if($media->delete()){
            return ['data' => ['id' => $media->id] ];
        }
    }

    public function updateMediaOrder(Request $request){
        $medias = $request->medias ;
        foreach ($medias as $key => $media){
            $myMedia = Media::find($media['id']);
            $myMedia->update([
                'order' => $key + 1
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'type' => ['required', 'string', 'max:255'],
            'url' => ['sometimes', 'max:255'],
            'mediaFile' => ['sometimes', 'file'],
            'transcript' => ['max:2500'],
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
