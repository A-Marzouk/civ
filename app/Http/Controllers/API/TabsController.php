<?php

namespace App\Http\Controllers\API;

use App\Tab;
use App\Http\Resources\Tab as TabResource;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TabsController extends Controller
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

        $tab = Tab::findOrFail($request->id);
        $tab->update($request->toArray());

        if ($tab->id){
            return new TabResource($tab);
        }
    }

    public function updateTabsOrder(Request $request){
        $tabs = $request->tabs ;
        foreach ($tabs as $key => $tab){
            $myTab = Tab::find($tab['id']);
            $myTab->update([
                'order' => $key + 1
            ]);
        }
    }


}
