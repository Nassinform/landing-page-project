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
            $project1Config = config('google.project_1');
            $client = $this->getGoogleClient($project1Config);

            $service = new Sheets($client);
            $spreadsheetId = '1UZUwIgGrX0Zgz-61iEc4fWcFtwOTfrS1yjft1HrnCwA';
            $range = 'Youcan-Orders';
            $response = $service->spreadsheets_values->get($spreadsheetId, $range);
            $values = $response->getValues();

            dd($values);
        } catch (\Exception $e) {
            dd('Error in Project 1:', $e->getMessage());
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

            dd($values);
        } catch (\Exception $e) {
            dd('Error in Project 2:', $e->getMessage());
        }
    }
}
