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

    public function downloadPDFResume ($themeCode, $userName) {
        // search the userdata using userName

        if ($userName) {

            // $view = \View::make('resume_pdf_themes.' . $themeCode, compact('freelancer'))->render();
            $pdf = \PDF::loadView('defaultPDFThemes.' . $themeCode);

            if (ob_get_contents()) ob_end_clean();

            // return $pdf->stream($freelancer->userData['first_name'] . ' ' . $freelancer->userData['last_name'] . '.pdf');
            return $pdf->stream('resume-'.$themeCode.'.pdf');
        }

        return view('defaultPDFThemes.' . $themeCode);
    }

}
