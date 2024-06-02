<?php

namespace App\Http\Controllers;

use App\Models\Advertising;
use Illuminate\Http\Request;

class AdvertisingController extends Controller
{
    public function getAdvertisings()
    {
        return view('admin.advertisings');
    }

    public function postAdvertisings(Request $request)
    {
        $data = $request->data;

        $validData = array_slice($data, 1); // Ignorer la première ligne

        foreach ($validData as $row) {
            $reportsStart = date('Y-m-d', strtotime('1899-12-30 +' . ($row[0]) . ' days'));
            $reportsEnd = date('Y-m-d', strtotime('1899-12-30 +' . ($row[1]) . ' days'));

            Advertising::create([
                'reports_start' => $reportsStart,
                'reports_end' => $reportsEnd,
                'name' => $row[2],
                'budget' => $row[7],
                'amount_spent' => $row[19],
            ]);
        }

        return response()->json(['message' => 'Votre importation à été éffectuer avec succès']);
    }
}
