<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Preference;
use Exception;
use Illuminate\Http\Request;

class PreferenceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function toggleVisibility(Request $request)
    {
        if(!is_auth($request)){
            throw new Exception('Not Authenticated!');
        }

        $preference = Preference::findOrFail($request->id);
        $preference->update($request->toArray());

        if ($preference->id){
            return $preference ;
        }
    }
}
