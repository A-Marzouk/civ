<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Language;
use App\Http\Resources\Language as LanguageResource;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguagesController extends Controller
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
        $languages = Auth::user()->languages;
        return LanguageResource::collection($languages);
    }

    public function languagesList()
    {
        $languages = Language::all();
        return LanguageResource::collection($languages);
    }

    public function storeMany(Request $request)
    {
       // attach a language to user:
        $user= User::find($request->user_id);
        // find the language id by name:
        $languagesID = [];
        foreach($request->langs as $language_label){
            $language = Language::where('label', $language_label)
                ->orWhere('label', 'like', '%'.$language_label.'%')->first();

            if($language){
                $languagesID[] = $language->id;
            }

        }

        $filteredLanguageIDs = [] ;
        foreach ($languagesID as $id){
            $filteredLanguageIDs[$id] = ['resume_link_id' => $request->resume_link_id] ;
        }

        $user->languages()->sync($filteredLanguageIDs, false);
        return $user->languages;
    }

    public function syncLanguages(Request $request)
    {
        // attach a language to user:
        $user= User::find($request->user_id);
        $languagesID = $request->IDs;
        $filteredLanguageIDs = [] ;
        foreach ($languagesID as $id){
            $filteredLanguageIDs[$id] = ['resume_link_id' => $request->resume_link_id] ;
        }
        $user->languages()->sync($filteredLanguageIDs);
        return $user->languages;
    }

    public function destroy($id,$user_id)
    {
        if(!is_auth($user_id)){
            throw new Exception('Not Authenticated!');
        }
        // detach a language from user:
        $user= User::find($user_id);
        $user->languages()->detach($id);
        return ['data' => ['id' => $id] ];
    }

    protected function is_auth($user_id){
        return (Auth::user()->id == $user_id || Auth::user()->hasRole('admin'));
    }
}
