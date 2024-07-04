<?php

namespace App\Http\Controllers;

use Exception;
use Omnipay\Omnipay;
use App\Models\Booking;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('AuthorizeNetApi_Api');
        $this->gateway->setAuthName(env('ANET_API_LOGIN_ID'));
        $this->gateway->setTransactionKey(env('ANET_TRANSACTION_KEY'));
        $this->gateway->setTestMode(true); //comment this line when move to 'live'
    }

    public function index()
    {
        $pagePrefix = 'payment';

        return view('payment.charge',compact('pagePrefix'));
    }

    public function charge(Request $request)
    {
        $expiryYear = '';
        $expiryMonth = '';

        if ($request->expiry_month) {
            $expiryMonth = $request->expiry_month;
            list($expiryYear, $expiryMonth) = explode('-', $expiryMonth);
        }

        try {
            $creditCard = new \Omnipay\Common\CreditCard([
                'number' => $request->cc_number,
                'expiryMonth' => $expiryMonth,
                'expiryYear' => $expiryYear,
                'cvv' => $request->cvv,
            ]);

            // Generate a unique merchant site transaction ID.
            $transactionId = rand(100000000, 999999999);

            // Convert the amount to cents
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
                $amount = $request->input('amount');

                // Insert transaction data into the database
                $isPaymentExist = Payment::where('transaction_id', $transaction_id)->first();

                if (!$isPaymentExist) {
                    $payment = new Payment;
                    $payment->transaction_id = $transaction_id;
                    $payment->booking_id = $request->bookingID;
                    $payment->amount = $request->amount; // store the original amount in dollars
                    $payment->currency = 'USD';
                    $payment->payment_status = 'Captured';
                    $payment->save();
                }

                return response()->json(['success' => true, 'message' => 'Payment is successful. Your transaction id is: ' . $transaction_id]);
            } else {
                // not successful
                return response()->json(['success' => false, 'message' => $response->getMessage()]);
            }
        } catch (Exception $e) {
            return response()->json(['error' => false, 'message' => $e->getMessage()]);
        }
    }

}
