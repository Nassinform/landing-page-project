<?php

namespace App\Http\Controllers;

use Revolution\Google\Sheets\Facades\Sheets;

class GoogleSheetController extends Controller
{
    // Dans le contrôleur
    public function index()
    {
        try {
            $sheets = Sheets::spreadsheet('1UZUwIgGrX0Zgz-61iEc4fWcFtwOTfrS1yjft1HrnCwA')->sheet("Youcan-Orders")->get();
            $header = $sheets->pull(0);
            $values = Sheets::collection($header, $sheets);
            $valuesArray = $values->toArray();

            return view('sheets.index', compact('header', 'valuesArray'));
        } catch (\Exception $e) {
            return view('sheets.index', ['error' => $e->getMessage()]);
        }
    }
}
