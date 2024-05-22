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

    // public function store(Request $request)
    // {
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'car_category' => 'required|string',
    //         'mode' => 'required|string',
    //         'pricepermiles_4' => 'required|numeric',
    //         'pricepermin_4' => 'required|numeric',
    //         'priceperhour_4' => 'required|numeric',
    //         'pricepermiles_5' => 'required|numeric',
    //         'pricepermin_5' => 'required|numeric',
    //         'priceperhour_5' => 'required|numeric',
    //         'pricepermiles_6' => 'required|numeric',
    //         'pricepermin_6' => 'required|numeric',
    //         'priceperhour_6' => 'required|numeric',
    //     ]);
    //     // Save data for 4 passengers
    //     $payment4 = new PaymentSetting();
    //     $payment4->car_category = $validatedData['car_category'];
    //     $payment4->mode = $validatedData['mode'];
    //     $payment4->no_pessenger = 4;
    //     $payment4->pricepermiles = $validatedData['pricepermiles_4'];
    //     $payment4->pricepermin = $validatedData['pricepermin_4'];
    //     $payment4->priceperhour = $validatedData['priceperhour_4'];
    //     $payment4->save();

    //     // Save data for 5 passengers
    //     $payment5 = new PaymentSetting();
    //     $payment5->car_category = $validatedData['car_category'];
    //     $payment5->mode = $validatedData['mode'];
    //     $payment5->no_pessenger = 5;
    //     $payment5->pricepermiles = $validatedData['pricepermiles_5'];
    //     $payment5->pricepermin = $validatedData['pricepermin_5'];
    //     $payment5->priceperhour = $validatedData['priceperhour_5'];
    //     $payment5->save();

    //     // Save data for 6 passengers
    //     $payment6 = new PaymentSetting();
    //     $payment6->car_category = $validatedData['car_category'];
    //     $payment6->mode = $validatedData['mode'];
    //     $payment6->no_pessenger = 6;
    //     $payment6->pricepermiles = $validatedData['pricepermiles_6'];
    //     $payment6->pricepermin = $validatedData['pricepermin_6'];
    //     $payment6->priceperhour = $validatedData['priceperhour_6'];
    //     $payment6->save();

    //     if ($payment4 || $payment5 || $payment6) {
    //         return redirect()->back()->with('success', 'Payment System update successfully.');
    //     } else {
    //         return redirect()->back()->with('error', 'Failed to update payment setting.');
    //     }
    // }

    // public function store(Request $request)
    // {
    //     // dd($request->payment_id_4);
    //     // Validate the incoming request data
    //     $validatedData = $request->validate([
    //         'car_category' => 'required|string',
    //         'mode' => 'required|string',
    //         'pricepermiles_4' => 'required|numeric',
    //         'pricepermin_4' => 'required|numeric',
    //         'priceperhour_4' => 'required|numeric',
    //         'pricepermiles_5' => 'required|numeric',
    //         'pricepermin_5' => 'required|numeric',
    //         'priceperhour_5' => 'required|numeric',
    //         'pricepermiles_6' => 'required|numeric',
    //         'pricepermin_6' => 'required|numeric',
    //         'priceperhour_6' => 'required|numeric',
    //     ]);


    //     if ($request->payment_id_4 == null) {
    //         dd($request->all());
    //         // Save data for 4 passengers
    //         $payment4 = new PaymentSetting();
    //         $payment4->car_category = $validatedData['car_category'];
    //         $payment4->mode = $validatedData['mode'];
    //         $payment4->no_pessenger = 4;
    //         $payment4->pricepermiles = $validatedData['pricepermiles_4'];
    //         $payment4->pricepermin = $validatedData['pricepermin_4'];
    //         $payment4->priceperhour = $validatedData['priceperhour_4'];
    //         $payment4->save();

    //         // Save data for 5 passengers
    //         $payment5 = new PaymentSetting();
    //         $payment5->car_category = $validatedData['car_category'];
    //         $payment5->mode = $validatedData['mode'];
    //         $payment5->no_pessenger = 5;
    //         $payment5->pricepermiles = $validatedData['pricepermiles_5'];
    //         $payment5->pricepermin = $validatedData['pricepermin_5'];
    //         $payment5->priceperhour = $validatedData['priceperhour_5'];
    //         $payment5->save();

    //         // Save data for 6 passengers
    //         $payment6 = new PaymentSetting();
    //         $payment6->car_category = $validatedData['car_category'];
    //         $payment6->mode = $validatedData['mode'];
    //         $payment6->no_pessenger = 6;
    //         $payment6->pricepermiles = $validatedData['pricepermiles_6'];
    //         $payment6->pricepermin = $validatedData['pricepermin_6'];
    //         $payment6->priceperhour = $validatedData['priceperhour_6'];
    //         $payment6->save();

    //         if ($payment4 || $payment5 || $payment6) {
    //             return redirect()->back()->with('success', 'Payment System update successfully.');
    //         } else {
    //             return redirect()->back()->with('error', 'Failed to update payment setting.');
    //         }
    //     }else{
    //         // Function to update or create payment setting
    //         $updateOrCreatePaymentSetting = function ($carCategory, $mode, $noPassenger, $pricePerMiles, $pricePerMin, $pricePerHour) {
    //             $payment = PaymentSetting::firstOrNew([
    //                 'car_category' => $carCategory,
    //                 'mode' => $mode,
    //                 'no_pessenger' => $noPassenger
    //             ]);
    //             $payment->pricepermiles = $pricePerMiles;
    //             $payment->pricepermin = $pricePerMin;
    //             $payment->priceperhour = $pricePerHour;
    //             $payment->save();
    //         };

    //         // Update or create data for 4 passengers
    //         $updateOrCreatePaymentSetting(
    //             $validatedData['car_category'],
    //             $validatedData['mode'],
    //             4,
    //             $validatedData['pricepermiles_4'],
    //             $validatedData['pricepermin_4'],
    //             $validatedData['priceperhour_4']
    //         );
    //         dd($updateOrCreatePaymentSetting);

    //         // Update or create data for 5 passengers
    //         $updateOrCreatePaymentSetting(
    //             $validatedData['car_category'],
    //             $validatedData['mode'],
    //             5,
    //             $validatedData['pricepermiles_5'],
    //             $validatedData['pricepermin_5'],
    //             $validatedData['priceperhour_5']
    //         );

    //         // Update or create data for 6 passengers
    //         $updateOrCreatePaymentSetting(
    //             $validatedData['car_category'],
    //             $validatedData['mode'],
    //             6,
    //             $validatedData['pricepermiles_6'],
    //             $validatedData['pricepermin_6'],
    //             $validatedData['priceperhour_6']
    //         );

    //         return redirect()->back()->with('success', 'Payment System updated successfully.');
    //     }


    //     dd('ok1');
    // }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'car_category' => 'required|string',
        'mode' => 'required|string',
        // 'pricepermiles_4' => 'required|numeric',
        // 'pricepermin_4' => 'required|numeric',
        // 'priceperhour_4' => 'required|numeric',
        // 'pricepermiles_5' => 'required|numeric',
        // 'pricepermin_5' => 'required|numeric',
        // 'priceperhour_5' => 'required|numeric',
        // 'pricepermiles_6' => 'required|numeric',
        // 'pricepermin_6' => 'required|numeric',
        // 'priceperhour_6' => 'required|numeric',
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
