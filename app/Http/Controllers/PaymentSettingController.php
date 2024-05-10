<?php

namespace App\Http\Controllers;

use App\Models\PaymentSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $pagePrefix = 'payment';

        $paymentSetting = PaymentSetting::all();

        return view('payment.index', compact('pagePrefix', 'paymentSetting'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'car_category' => 'required|string',
            'mode' => 'required|string',
            'pricepermiles_4' => 'required|numeric',
            'pricepermin_4' => 'required|numeric',
            'priceperhour_4' => 'required|numeric',
            'pricepermiles_5' => 'required|numeric',
            'pricepermin_5' => 'required|numeric',
            'priceperhour_5' => 'required|numeric',
            'pricepermiles_6' => 'required|numeric',
            'pricepermin_6' => 'required|numeric',
            'priceperhour_6' => 'required|numeric',
        ]);
        // Save data for 4 passengers
        $payment4 = new PaymentSetting();
        $payment4->car_category = $validatedData['car_category'];
        $payment4->mode = $validatedData['mode'];
        $payment4->no_pessenger = 4;
        $payment4->pricepermiles = $validatedData['pricepermiles_4'];
        $payment4->pricepermin = $validatedData['pricepermin_4'];
        $payment4->priceperhour = $validatedData['priceperhour_4'];
        $payment4->save();

        // Save data for 5 passengers
        $payment5 = new PaymentSetting();
        $payment5->car_category = $validatedData['car_category'];
        $payment5->mode = $validatedData['mode'];
        $payment5->no_pessenger = 5;
        $payment5->pricepermiles = $validatedData['pricepermiles_5'];
        $payment5->pricepermin = $validatedData['pricepermin_5'];
        $payment5->priceperhour = $validatedData['priceperhour_5'];
        $payment5->save();

        // Save data for 6 passengers
        $payment6 = new PaymentSetting();
        $payment6->car_category = $validatedData['car_category'];
        $payment6->mode = $validatedData['mode'];
        $payment6->no_pessenger = 6;
        $payment6->pricepermiles = $validatedData['pricepermiles_6'];
        $payment6->pricepermin = $validatedData['pricepermin_6'];
        $payment6->priceperhour = $validatedData['priceperhour_6'];
        $payment6->save();

        if ($payment4 || $payment5 || $payment6) {
            return redirect()->back()->with('success', 'Payment System update successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update payment setting.');
        }
    }
}
