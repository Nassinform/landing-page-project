<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function getAdminAuth()
    {
        return view('admin.login');
    }

    public function postAdminAuth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|max:30'
        ], [
            'email.exists' => 'Cet email n\'existe pas'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('getDashboard'));
        }

        return redirect()->route('getAdminAuth')->with('error', 'Identifiants invalides.');
    }

    public function getDashboard()
    {
        // Compter le nombre de femmes
        $orderCount = Order::count();

        return view('admin.dashboard', [
            'orderCount' => $orderCount,
        ]);
    }

    public function getListOforders()
    {
        $orders = Order::all();

        return view('admin.listOfOrders', compact('orders'));
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
