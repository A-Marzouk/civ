<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Spatie\PdfToText\Pdf;

class ImportsController extends Controller
{
    public function extractTextFromCV(Request $request)
    {

        $request->validate([
            'pdf_cv' => 'required|file|mimes:pdf|max:30000'
        ]);

        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($request->pdf_cv);

        $text = $pdf->getText();

        $parser = new \Smalot\PdfParser\Parser();
        $pdf = $parser->parseFile($request->pdf_cv);

        $text = $pdf->getText();
        echo $text;

        return $text;
    }


}
