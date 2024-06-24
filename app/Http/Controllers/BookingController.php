<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\PaymentSetting;
use App\Mail\BookingPaymentMail;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookingController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        $pagePrefix = 'booking';

        return view('booking.index', compact('pagePrefix'));
    }

    public function allbookings(Request $request)
    {
        $user = Auth::user();

        if ($user->hasRole('customer')) {
            $booking = Booking::with('userData')
                ->where('user_id', $user->id)
                ->whereNull('deleted_at');
        } elseif ($user->hasRole('driver')) {
            $booking = Booking::with('userData')
                ->where('driver', $user->id)
                ->whereNull('deleted_at');
        } else {
            $booking = Booking::with('userData')
                ->whereNull('deleted_at');
        }

        // Apply search filter if search query is provided
        if ($request->has('search') && !empty($request->input('search')['value'])) {
            $searchValue = $request->input('search')['value'];
            $booking->where(function ($query) use ($searchValue) {
                $query->where('car_category', 'like', '%' . $searchValue . '%')
                    ->orWhere('pick_location', 'like', '%' . $searchValue . '%')
                    ->orWhere('drop_location', 'like', '%' . $searchValue . '%')
                    ->orWhereHas('userData', function ($subQuery) use ($searchValue) {
                        $subQuery->where('name', 'like', '%' . $searchValue . '%')
                            ->orwhere('email', 'like', '%' . $searchValue . '%');
                    });
            });
        }

        return DataTables::of($booking)
            ->addColumn('name', function ($row) {
                return $row->userData->name;
            })
            ->addColumn('email', function ($row) {
                return $row->userData->email;
            })
            ->editColumn('driver', function ($row) {
                if (Auth::user()->hasRole('admin')) {
                    if ($row->status != 'Ride Accepted') {
                        // Render dropdown list for admin to select driver
                        $drivers = User::role('driver')
                            ->whereHas('driverData', function ($query) use ($row) {
                                // Filter by car category
                                $query->where('category', $row->car_category)
                                    ->where('pessenger', $row->passenger);
                            })
                            ->where(function ($query) {
                                // Filter by status (complete or active)
                                $query->where('status', 'complete')
                                    ->orWhere('status', 'active');
                            })
                            ->pluck('name', 'id')
                            ->toArray();
                        $dropdown = '<select class="form-control fs-8 driver-select">';
                        $dropdown .= '<option value="">Select Driver</option>';
                        foreach ($drivers as $id => $name) {
                            $selected = $row->driver == $id ? 'selected' : '';
                            $dropdown .= '<option value="' . $id . '" ' . $selected . '>' . $name . '</option>';
                        }
                        $dropdown .= '</select>';
                        return $dropdown;
                    } else {
                        return isset($row->driver) ? $row->driverData->name : 'N/A';
                    }
                } else {
                    return isset($row->driver) ? $row->driverData->name : 'N/A';
                }
            })

            ->editColumn('status', function ($row) {
                return ucfirst($row->status);
            })
            ->addColumn('action', function ($row) {
                $actionBtn = '<a href="' . route('map.show', ['id' => $row->id]) . '" class="delete btn btn-primary btn-sm">
                    <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-map-marker" aria-hidden="true" style="padding-right:0px !important;"></i>
                    </i>
                    </span>
                </a>';
                if (!Auth::user()->hasRole('customer')) {
                    $actionBtn .= '&nbsp;&nbsp;<a href="javascript:void(0)" class="delete btn btn-danger btn-sm">
                        <span class="svg-icon svg-icon-3" style="margin-right:0px;"><i class="fa fa-trash" aria-hidden="true" style="padding-right:0px !important;"></i>
                        </span>
                    </a>';
                }
                return $actionBtn;
            })
            ->rawColumns(['action', 'driver'])
            ->make(true);
    }

    public function assginDriver(Request $request)
    {
        try {
            $booking = Booking::findOrFail($request->booking_id);
            $booking->driver = $request->driver_id;
            $booking->status = 'Driver Assigned';
            $booking->save();

            return response()->json(['success' => true, 'message' => 'Driver assigned successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => 'Failed to assign driver']);
        }
    }

    public function ridestatus(Request $request)
    {
        try {
            $booking = Booking::findOrFail($request->booking_id);
            $booking->status = $request->status;
            $booking->save();

            return response()->json(['success' => true, 'message' => 'Ride Status Update Successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => false, 'message' => 'Failed to accepted ride']);
        }
    }

    public function showMap($id)
    {
        $pagePrefix = 'booking';
        $booking = Booking::find($id);
        $estimatedPrice = PaymentSetting::where('mode', $booking->mode)->where('car_category', $booking->car_category)->where('no_pessenger', $booking->passenger)->first();
        $pickupLocation = ['lat' => $booking->pickup_latitude, 'lng' => $booking->pickup_longitude];
        $dropoffLocation = ['lat' => $booking->dropoff_latitude, 'lng' => $booking->dropoff_longitude];

        return view('booking.map', compact('pickupLocation', 'dropoffLocation', 'booking', 'estimatedPrice', 'pagePrefix'));
    }

    public function fetchLatestData($id)
    {
        $booking = Booking::find($id);

        $estimatedPrice = PaymentSetting::where('mode', $booking->mode)->where('car_category', $booking->car_category)->where('no_pessenger', $booking->passenger)->first();


        $driverDocs = collect(json_decode($booking->driverData->driverDoc, true));
        $carDocs = $driverDocs->where('type', 'car');
        $firstCarDoc = $carDocs->first();
        $imagePath = str_replace('public', 'storage', $firstCarDoc['path']);

        $distance = floatval(str_replace('mi', '', $booking->distance));
        $price = $estimatedPrice->pricepermiles * $distance;

        return response()->json([
            'status' => $booking->status,
            'distance' => $booking->distance,
            'price' => $price,
            'driver' => [
                'name' => $booking->driverData->name,
                'phone' => $booking->driverData->phone,
                'car_number' => $booking->driverData->driverData->register_no,
                'car_image' => $imagePath,
            ]
        ]);
    }

    public function endRide(Request $request)
    {
        $booking = Booking::findOrFail($request->booking_id);
        $booking->status = $request->status;
        $booking->save();

        // Send email with payment link
        $this->sendPaymentEmail($booking);

        return response()->json([
            'success' => true,
            'message' => 'Ride ended successfully.',
            'booking' => $booking,
        ]);
    }

    public function showPaymentPage(Request $request)
    {
        $pagePrefix = 'booking';
        $booking = Booking::findOrFail($request->booking_id);

        // Calculate estimated price with fees
        $distance = floatval(str_replace('mi', '', $booking->distance));
        $estimatedPrice = PaymentSetting::where('mode', $booking->mode)->where('car_category', $booking->car_category)->where('no_pessenger', $booking->passenger)->first();
        $price = $estimatedPrice->pricepermiles * $distance;
        $totalPrice = $price + 3.50 + 3.75;

        return view('booking.payment', compact('booking', 'totalPrice', 'price', 'pagePrefix'));
    }

    protected function sendPaymentEmail($booking)
    {
        $distance = floatval(str_replace('mi', '', $booking->distance));
        $estimatedPrice = PaymentSetting::where('mode', $booking->mode)->where('car_category', $booking->car_category)->where('no_pessenger', $booking->passenger)->first();
        $price = $estimatedPrice->pricepermiles * $distance;
        $totalPrice = $price + 3.50 + 3.75;

        // Send email with payment link
        Mail::to($booking->userData->email)->send(new BookingPaymentMail($booking, $totalPrice));
    }

    public function processPayment(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $totalPrice = $booking->estimated_price + 3.50 + 3.75;

        // Apply coupon if provided
        if ($request->has('coupon')) {
            $coupon = $request->coupon;
            // Validate and apply coupon logic here
            // For example, let's say the coupon gives a 10% discount
            $discount = $totalPrice * 0.10;
            $totalPrice -= $discount;
        }

        // Process payment logic here (e.g., integrate with Stripe or PayPal)

        // Redirect to bookings page after successful payment
        return redirect()->route('bookings.index')->with('success', 'Payment successful.');
    }


    public function softDelete($id)
    {
        // Find the user by ID
        $user = Booking::findOrFail($id);

        // Soft delete the user
        $user->delete();

        // Optionally, you can redirect back with a success message
        session()->flash('success', 'Booking is deleted successfully');

        // Redirect back
        return redirect()->back();
    }
}
