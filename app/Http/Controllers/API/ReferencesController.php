<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Reference;
use App\Http\Resources\Reference as ReferenceResource;
use App\User;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Exception;

class ReferencesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except('store');
    }



    public function index()
    {
        $references = Reference::where('user_id',Auth::user()->id)->paginate(5);
        return ReferenceResource::collection($references);

    }
    public function store(Request $request)
    {

        $this->validator($request->all())->validate();

        if($request->isMethod('put') || $request->id != '' ){
            // update
            if($request['is_public'] == false || $request['is_public'] === 'false' ){
                $request['is_public'] = false ;
            }
            else if($request['is_public'] == true || $request['is_public'] === 'true') {
                $request['is_public'] = true ;
            }
            $reference = Reference::findOrFail($request->id);
            $reference->update($request->toArray());
        }else{
            // add
            $reference = Reference::create($request->toArray());
        }



        if (isset($_FILES['file'])) {
            $imagePath = Upload::referenceImage($request);
            if($imagePath){
                $reference->update([
                    'image' => $imagePath['path']
                ]);
            }else{
                throw new Exception('Failed to upload image');
            }
        }

        if ($reference->id){
            return new ReferenceResource($reference);
        }
    }

    public function show($id)
    {
        $reference = Reference::where([
            'id' => $id,
        ])->first();

        return new ReferenceResource($reference);
    }

    public function destroy($id)
    {
        $reference = Reference::where([
            'id' => $id,
        ])->first();

        if(!$this->is_auth($reference)){
            throw new Exception('Not Authenticated!');
        }


        if($reference->delete()){
            return ['data' => ['id' => $reference->id] ];
        }
    }



    public function updateReferencesOrder(Request $request){
        $references = $request->references ;
        foreach ($references as $key => $reference){
            $myReference= Reference::find($reference['id']);
            $myReference->update([
                'order' => $key + 1
            ]);
        }
    }


    protected function validator(array $data)
    {
        $url_regex = "/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w\-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/" ;

        return Validator::make($data, [
            'type' => ['required', 'string', 'max:255','min:3'],
            'name' => ['required', 'string', 'max:255','min:3'],
            'title' => ['required', 'string', 'min:3', 'max:255'],
            'phone' => ['required','min:7', 'numeric'],
            'email' => ['required', 'email', 'max:255'],
            'company' => ['required', 'string', 'max:255','min:3'],
            'address' => ['required', 'string', 'max:255','min:3'],
            'reference_text' => ['required','string', 'max:2500','min:50'],
            'url' => ['required','max:255','min:3', "regex:".$url_regex],
            'image' => ['required','string', 'min:3', 'max:255'],
            'file' => ['sometimes','file']
        ]);
    }

    protected function is_auth($request){
        return (Auth::user()->id == $request->user_id || Auth::user()->hasRole('admin'));
    }
}
