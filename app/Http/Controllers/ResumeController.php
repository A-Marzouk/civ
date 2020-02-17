<?php
/**
 * Created by PhpStorm.
 * User: Ahmed-pc
 * Date: 2/14/2020
 * Time: 10:30 AM
 */

namespace App\Http\Controllers;


class ResumeController extends Controller
{

    public function themePreview ($themeCode) {
        return view('defaultThemes.' . $themeCode);
    }

}
