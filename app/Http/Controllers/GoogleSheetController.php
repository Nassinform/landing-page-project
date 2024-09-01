<?php

namespace App\Http\Controllers;

use Google\Client;
use Google\Service\Sheets;

class GoogleSheetController extends Controller
{
    private function getGoogleClient($projectConfig)
    {
        $client = new Client();
        $client->setApplicationName($projectConfig['application_name']);
        $client->setScopes($projectConfig['scopes']);
        $client->setAuthConfig($projectConfig['service']['file']);
        $client->setAccessType($projectConfig['access_type']);

        return $client;
    }

    public function index()
    {
        try {
            // Configurer les services pour le premier projet
            //config(['services.google_sheets' => config('google.project_1')]);

            $sheets = Sheets::spreadsheet('1UZUwIgGrX0Zgz-61iEc4fWcFtwOTfrS1yjft1HrnCwA')
                ->sheet("Youcan-Orders")
                ->get();

            $header = $sheets->pull(0);
            $values = Sheets::collection($header, $sheets);
            $valuesArray = $values->toArray();

            dd($values);
        } catch (\Exception $e) {
            dd('Error in Project 1:', $e->getMessage());
        }
    }

    public function index2()
    {
        try {
            // Configurer les services pour le deuxième projet
            config(['services.google_sheets' => config('google.project_2')]);

            $sheets = Sheets::spreadsheet('18Rn15rkcxfKbCWHFveVr5RxU9kXS_aBawAvImfBVE9s')
                ->sheet("Youcan-Orders")
                ->get();

            $header = $sheets->pull(0);
            $values = Sheets::collection($header, $sheets);
            $valuesArray = $values->toArray();

            return view('sheets.index1', compact('header', 'valuesArray'));
        } catch (\Exception $e) {
            dd('Error in Project 2:', $e->getMessage());
        }
    }
}
