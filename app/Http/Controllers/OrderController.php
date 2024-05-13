<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        // Création d'un nouvel enregistrement Order dans la base de données
        $order = new Order();
        $order->name = $request['name'];
        $order->phone_number = $request['phoneNumber'];
        $order->wilaya = $request['wilaya'];
        $order->commune = $request['commune'];
        $order->save();

        // Utilisez ces variables dans votre réponse ou votre vue
        Session::flash('success', 'تم إرسال طلبك بنجاح');

        return redirect()->back()->withInput();
    }
}
