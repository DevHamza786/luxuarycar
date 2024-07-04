<?php

namespace App\Http\Controllers;

use App\Models\User;
use Omnipay\Omnipay;
use App\Models\Booking;
use App\Models\Payment;
use App\Mail\UserRegistered;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
use App\Mail\BookingConfirmation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Auth\Events\Registered;

class HomeController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');
        $this->gateway->setAuthName(env('ANET_API_LOGIN_ID'));
        $this->gateway->setTransactionKey(env('ANET_TRANSACTION_KEY'));
        $this->gateway->setTestMode(true); //comment this line when move to 'live'
    }
    // public function store(Request $request)
    // {
    //     dd($request->all());

    //     $user = User::where('email', $request->email)->first();

    //     if ($user) {
    //         // User exists, create booking for existing user
    //         $booking = Booking::create([
    //             'user_id' => $user->id,
    //             'mode'=> $request->mode,
    //             'time' => $request->time,
    //             'date' => $request->date,
    //             'car_category' => $request->car_category,
    //             'pick_location' => $request->pick_location,
    //             'pickup_latitude' => $request->pickup_latitude,
    //             'pickup_longitude' => $request->pickup_longitude,
    //             'drop_location' => $request->drop_location,
    //             'dropoff_latitude' => $request->dropoff_latitude,
    //             'dropoff_longitude' => $request->dropoff_longitude,
    //             'passenger' => $request->no_pessenger,
    //             'fare_time' => $request->fare_time,
    //             'distance' => $request->distance,
    //             'status' => 'awaiting for driver',
    //         ]);

    //         event(new Registered($user));

    //         Auth::login($user);

    //         return redirect(RouteServiceProvider::HOME);
    //     } else {
    //         // User does not exist, create new user and booking
    //         $user = User::create([
    //             'name' => $request->fname.' '.$request->lname,
    //             'email' => $request->email,
    //             'password' => Hash::make($request->email),
    //             'status' => 'active'
    //         ]);

    //         $user->assignRole('customer');

    //         if ($user) {
    //             $booking = Booking::create([
    //                 'user_id' => $user->id,
    //                 'mode'=> $request->mode,
    //                 'time' => $request->time,
    //                 'date' => $request->date,
    //                 'car_category' => $request->car_category,
    //                 'pick_location' => $request->pick_location,
    //                 'pickup_latitude' => $request->pickup_latitude,
    //                 'pickup_longitude' => $request->pickup_longitude,
    //                 'drop_location' => $request->drop_location,
    //                 'dropoff_latitude' => $request->dropoff_latitude,
    //                 'dropoff_longitude' => $request->dropoff_longitude,
    //                 'passenger' => $request->no_pessenger,
    //                 'fare_time' => $request->fare_time,
    //                 'distance' => $request->distance,
    //                 'status' => 'awaiting for driver',
    //             ]);

    //             event(new Registered($user));

    //             Auth::login($user);

    //             return redirect(RouteServiceProvider::HOME);
    //         } else {
    //             return Redirect::back();
    //         }
    //     }
    // }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {
            // Check if user exists
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                // Create new user
                $user = User::create([
                    'name' => $request->fname . ' ' . $request->lname,
                    'email' => $request->email,
                    'password' => Hash::make($request->email),
                    'status' => 'active'
                ]);

                $user->assignRole('customer');
            }

            // Create booking
            $booking = Booking::create([
                'user_id' => $user->id,
                'mode' => $request->mode,
                'time' => $request->time,
                'date' => $request->date,
                'car_category' => $request->car_category,
                'pick_location' => $request->pick_location,
                'pickup_latitude' => $request->pickup_latitude,
                'pickup_longitude' => $request->pickup_longitude,
                'drop_location' => $request->drop_location,
                'dropoff_latitude' => $request->dropoff_latitude,
                'dropoff_longitude' => $request->dropoff_longitude,
                'passenger' => $request->no_pessenger,
                'fare_time' => $request->fare_time,
                'distance' => $request->distance,
                'status' => 'awaiting for driver',
            ]);

            // Process payment
            $paymentResponse = $this->chargePayment($request);

            if ($paymentResponse['success'] == true) {

                $isPaymentExist = Payment::where('transaction_id', $paymentResponse['transaction_id'])->first();

                if (!$isPaymentExist) {
                    $payment = new Payment;
                    $payment->transaction_id = $paymentResponse['transaction_id'];
                    $payment->booking_id = $booking->id;
                    $payment->amount = $request->amount; // store the original amount in dollars
                    $payment->currency = 'USD';
                    $payment->payment_status = 'Captured';
                    $payment->save();
                }

                // Commit transaction
                DB::commit();

                // Trigger registration event and log in user
                event(new Registered($user));
                Auth::login($user);

                $plainPassword = $request->email;


                Mail::to($user->email)->send(new UserRegistered($user, $plainPassword));
                Mail::to($user->email)->send(new BookingConfirmation($booking, $request->amount));

                // Send email to admin
                $adminEmail = 'admin@luxuryccs.com';
                Mail::to($adminEmail)->send(new BookingConfirmation($booking, $request->amount));


                return response()->json(['success' => true, 'message' => 'Booking and payment were successful.']);
            } else {
                throw new \Exception($paymentResponse['message']);
            }
        } catch (\Exception $e) {
            // Rollback transaction on failure
            DB::rollBack();
            Log::error('Booking and Payment Error: ' . $e->getMessage());

            return response()->json(['success' => false, 'message' => $e->getMessage()]);
        }
    }

    private function chargePayment($request)
    {
        $expiryYear = '';
        $expiryMonth = '';

        if ($request->input('expiry_month')) {
            $expiryMonth = $request->input('expiry_month');
            list($expiryYear, $expiryMonth) = explode('-', $expiryMonth);
        }

        try {
            $creditCard = new \Omnipay\Common\CreditCard([
                'number' => $request->input('cc_number'),
                'expiryMonth' => $expiryMonth,
                'expiryYear' => $expiryYear,
                'cvv' => $request->input('cvv'),
            ]);

            // Generate a unique merchant site transaction ID.
            $transactionId = rand(100000000, 999999999);

            $amountInCents = intval($request->amount * 100);

            $response = $this->gateway->authorize([
                'amount' => $amountInCents,
                'currency' => 'USD',
                'transactionId' => $transactionId,
                'card' => $creditCard,
            ])->send();

            if ($response->isSuccessful()) {
                // Captured from the authorization response.
                $transactionReference = $response->getTransactionReference();

                $response = $this->gateway->capture([
                    'amount' => $amountInCents,
                    'currency' => 'USD',
                    'transactionReference' => $transactionReference,
                ])->send();

                $transaction_id = $response->getTransactionReference();

                return ['success' => true, 'transaction_id' => $transaction_id];
            } else {
                return ['success' => false, 'message' => $response->getMessage()];
            }
        } catch (\Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    public function estimatedPrice(Request $request)
    {
        try {
            $data = [];
            $distance = floatval(str_replace('mi', '', $request->distance));

            // Parse the duration
            $durationString = $request->duration;
            $duration = 0;

            // Check for hours and minutes
            if (strpos($durationString, 'hours') !== false) {
                preg_match('/(\d+)\s*hours?/', $durationString, $hoursMatch);
                $duration += intval($hoursMatch[1]) * 60; // Convert hours to minutes
            }

            if (strpos($durationString, 'mins') !== false) {
                preg_match('/(\d+)\s*mins?/', $durationString, $minutesMatch);
                $duration += intval($minutesMatch[1]); // Add minutes
            }

            $no_pessenger = $request->no_pessenger;

            if ($no_pessenger > 6) {
                $no_pessenger = 6;
            } elseif ($no_pessenger < 2) {
                $no_pessenger = 4;
            }

            $estimatedPrice = PaymentSetting::where('mode', $request->mode)
                ->where('car_category', $request->car_category)
                ->where('no_pessenger', $no_pessenger)
                ->first();
            if ($request->mode == 'mrh') {
                if ($duration < 60) {
                    $price = $estimatedPrice->priceperhour;
                } else {
                    $price = $estimatedPrice->priceperhour + ($estimatedPrice->pricepermiles * $distance);
                }
            } else if($request->mode == 'mor') {
                if($distance < 60){
                    $price = $estimatedPrice->pricepermiles + $estimatedPrice->priceperhour;
                }else{
                    $price = ($estimatedPrice->pricepermiles + $estimatedPrice->priceperhour) + ($estimatedPrice->pricepermin * $duration) + ($estimatedPrice->pricepermiles * $distance);
                }
            }else{
                $price = $estimatedPrice->pricepermiles * $distance;
            }

            $totalPrice = $price + 3.50 + 3.75;
            $data = [
                'estimatedPrice' => floatval($price),
                'totalPrice' => $totalPrice,
            ];
            return response()->json(['success' => true, 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => 'Failed to Calculate Booking Price']);
        }
    }

    public function passwordUpdate(Request $request)
    {

        $user = $request->user();

        if (!Hash::check($request->currentpassword, $user->password)) {
            return response()->json(['success' => false, 'message' => 'Current password is incorrect.'], 422);
        }

        $user->update([
            'password' => Hash::make($request->newpassword),
        ]);

        return response()->json(['success' => true, 'message' => 'Password updated successfully.'], 200);
    }
}
