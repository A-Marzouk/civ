<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use Spatie\PdfToText\Pdf;

class ImportsController extends Controller
{
    public function extractTextFromPDF(Request $request)
    {

        $request->validate([
            'cv' => 'required|file|mimes:pdf|max:30000'
        ]);

        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($request->cv);

        $text = $pdf->getText();

        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($request->cv);

        $text = $pdf->getText();
        echo $text;

        return $text;
    }


    public function extractTextFromDocx(Request $request)
    {
        // Read contents
        $phpWord = IOFactory::load($request->cv);
        return $phpWord->sections;
    }


}
