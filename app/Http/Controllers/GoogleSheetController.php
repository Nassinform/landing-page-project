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

    public function index1()
    {
        try {
            $project1Config = config('google.project_1');
            $client = $this->getGoogleClient($project1Config);

            $service = new Sheets($client);
            $spreadsheetId = '1UZUwIgGrX0Zgz-61iEc4fWcFtwOTfrS1yjft1HrnCwA';
            $range = 'Youcan-Orders';
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();

            // Séparer les en-têtes des valeurs
            $header = array_shift($values);
            $valuesArray = $values;

            return view('sheets.index1', compact('header', 'valuesArray'));
        } catch (\Exception $e) {
            return view('sheets.index1', ['error' => $e->getMessage()]);
        }
    }

    public function index2()
    {
        try {
            $project2Config = config('google.project_2');
            $client = $this->getGoogleClient($project2Config);

            $service = new Sheets($client);
            $spreadsheetId = '18Rn15rkcxfKbCWHFveVr5RxU9kXS_aBawAvImfBVE9s';
            $range = 'Youcan-Orders';
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();

            // Séparer les en-têtes des valeurs
            $header = array_shift($values);
            $valuesArray = $values;

            return view('sheets.index2', compact('header', 'valuesArray'));
        } catch (\Exception $e) {
            return view('sheets.index2', ['error' => $e->getMessage()]);
        }
    }
}
