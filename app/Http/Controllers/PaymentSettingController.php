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
        ]);

        // Function to update or create payment setting
        $updateOrCreatePaymentSetting = function ($id, $carCategory, $mode, $noPassenger, $pricePerMiles, $pricePerMin, $pricePerHour) {
            $payment = PaymentSetting::firstOrNew(['id' => $id]);
            $payment->car_category = $carCategory;
            $payment->mode = $mode;
            $payment->no_pessenger = $noPassenger;
            $payment->pricepermiles = $pricePerMiles;
            $payment->pricepermin = $pricePerMin;
            $payment->priceperhour = $pricePerHour;
            $payment->save();
        };

        // Update or create data for 4 passengers
        $updateOrCreatePaymentSetting(
            $request->input('payment_id_4'),
            $validatedData['car_category'],
            $validatedData['mode'],
            4,
            $request->input('pricepermiles_4'),
            $request->input('pricepermin_4'),
            $request->input('priceperhour_4')
        );

        // Update or create data for 5 passengers
        $updateOrCreatePaymentSetting(
            $request->input('payment_id_5'),
            $validatedData['car_category'],
            $validatedData['mode'],
            5,
            $request->input('pricepermiles_5'),
            $request->input('pricepermin_5'),
            $request->input('priceperhour_5')
        );

        // Update or create data for 6 passengers
        $updateOrCreatePaymentSetting(
            $request->input('payment_id_6'),
            $validatedData['car_category'],
            $validatedData['mode'],
            6,
            $request->input('pricepermiles_6'),
            $request->input('pricepermin_6'),
            $request->input('priceperhour_6')
        );

        return redirect()->back()->with('success', 'Payment System updated successfully.');
    }
}
