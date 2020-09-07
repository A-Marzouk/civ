<?php

namespace App\Http\Controllers\API;

use App\classes\Upload;
use App\Http\Controllers\Controller;
use App\Import;
use App\Http\Resources\Import as ImportResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ImportsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $imports = Import::where('user_id',Auth::user()->id)->paginate(5);
        return ImportResource::collection($imports);
    }

    public function store(Request $request)
    {

        $this->validator($request->all())->validate();
        $request['resume_link_id'] = User::find($request->user_id)->resume_link_id;
        $import = Import::create($request->toArray());

        // if isset file - upload the file and save the url.
        if (isset($_FILES['importFile'])) {
            $pathToFile = Upload::docFile($request);
            if($pathToFile){
                $import->update([
                    'url' =>$pathToFile
                ]);
            }else{
                throw new Exception('Failed to upload image');
            }
        }

        if ($import->id){
            return new ImportResource($import);
        }
    }

    public function show($id)
    {
        $import = Import::where([
            'id' => $id,
        ])->first();

        return new ImportResource($import);
    }

    public function destroy($id)
    {
        $import = Import::where([
            'id' => $id,
        ])->first();

        if($import->delete()){
            return ['data' => ['id' => $import->id] ];
        }
    }

    public function updateImportsOrder(Request $request){
        $imports = $request->imports ;
        foreach ($imports as $key => $import){
            $myImport = Import::find($import['id']);
            $myImport->update([
                'order' => $key + 1
            ]);
        }
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => ['required', 'string', 'max:255','min:3'],
            'category' => ['string', 'max:255'],
            'url' => ['sometimes','max:255'],
        ]);
    }
}
