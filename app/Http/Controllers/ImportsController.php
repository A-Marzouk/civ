<?php

namespace App\Http\Controllers;


use Behance\Client;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\IOFactory;
use Illuminate\Support\Facades\Response;
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

    public function getDataFromBehance($behanceUsername){
        $apiKey = env('BEHANCE_API_KEY');
        $client = new Client($apiKey);

        if (!empty($behanceUsername)) {
            $data = $client->getUser($behanceUsername);
            if (!$data) {
                return;
            }

            $projects = $client->getUserProjects($behanceUsername);
            $data->projects = $projects;

            foreach ($projects as &$project) {
                $project->selected = false ;
            }

            $fullProjects = [];

            foreach ($projects as $project) {
                $fullProjects[] = $client->getProject($project->id);
            }

            $data->fullProjects = $fullProjects;

        } else {
            $data = [];
        }

        return Response::json($data);
    }

    protected function getBehanceUserNameFromURL($behanceURL)
    {
        $username = $behanceURL;

        return $username;
    }


}
