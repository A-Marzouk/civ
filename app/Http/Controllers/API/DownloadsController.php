<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DownloadsController extends Controller
{

    public function updateTabsOrder(Request $request){
        $downloads= $request->downloads ;
        foreach ($downloads as $key => $download){
            $myDownload = Tab::find($download['id']);
            $myDownload->update([
                'order' => $key + 1
            ]);
        }
    }
}
