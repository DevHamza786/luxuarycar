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

        return view('payment.index', compact('pagePrefix' , 'paymentSetting'));
    }

    public function store(Request $request)
    {
        $paymentSetting = PaymentSetting::updateOrCreate(
            ['mode' => $request->mode, 'car_category' => $request->car_category, 'no_pessenger' => $request->no_pessenger],
            [
                'pricepermiles' => $request->pricepermiles,
                'pricepermin' => $request->pricepermin,
            ]
        );

        if ($paymentSetting) {
            return redirect()->back()->with('success', 'Payment System update successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update payment setting.');
        }
    }
}
