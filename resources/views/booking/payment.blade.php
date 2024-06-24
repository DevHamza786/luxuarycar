@extends('layouts.app')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <div class="card">
                    <!--begin::Body-->
                    <div class="card-body p-lg-20">
                        <!--begin::Layout-->
                        <div class="d-flex flex-column flex-xl-row">
                            <!--begin::Content-->
                            <div class="flex-lg-row-fluid me-xl-18 mb-10 mb-xl-0">
                                <!--begin::Invoice 2 content-->
                                <div class="mt-n1">

                                    <!--begin::Wrapper-->
                                    <div class="m-0">
                                        <!--begin::Label-->
                                        <div class="fw-bold fs-3 text-gray-800 mb-8">Payment for Booking
                                            #{{ $booking->id }}</div>
                                        <!--end::Label-->

                                        <!--begin::Row-->
                                        <div class="row g-5 mb-11">
                                            <!--end::Col-->
                                            <div class="col-sm-12">
                                                <!--end::Label-->
                                                <div class="fw-semibold fs-7 text-gray-600 mb-1">Booking Date:</div>
                                                <!--end::Label-->

                                                <!--end::Col-->
                                                <div class="fw-bold fs-6 text-gray-800">{{ $booking->date }}</div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->


                                        <!--begin::Content-->
                                        <div class="flex-grow-1">
                                            <!--begin::Table-->
                                            <div class="table-responsive border-bottom mb-9">
                                                <table class="table mb-3">
                                                    <thead>
                                                        <tr class="border-bottom fs-6 fw-bold text-muted">
                                                            <th class="min-w-175px pb-2">Description</th>
                                                            <th class="min-w-100px text-end pb-2">Amount</th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                            <td class="d-flex align-items-center pt-6">
                                                                <i class="fa fa-genderless text-danger fs-2 me-2"></i>
                                                                Booking Fee
                                                            </td>
                                                            <td class="pt-6 text-gray-900 fw-bolder">$3.50</td>
                                                        </tr>

                                                        <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                            <td class="d-flex align-items-center">
                                                                <i class="fa fa-genderless text-success fs-2 me-2"></i>
                                                                Credit Card Fee
                                                            </td>
                                                            <td class="fs-5 text-gray-900 fw-bolder">$3.75</td>
                                                        </tr>

                                                        <tr class="fw-bold text-gray-700 fs-5 text-end">
                                                            <td class="d-flex align-items-center">
                                                                <i class="fa fa-genderless text-primary fs-2 me-2"></i>
                                                                Booking Fare
                                                            </td>
                                                            <td class="fs-5 text-gray-900 fw-bolder">${{ $price }}
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!--end::Table-->

                                            <!--begin::Container-->
                                            <div class="d-flex justify-content-end">
                                                <!--begin::Section-->
                                                <div class="mw-300px">
                                                    <!--begin::Item-->
                                                    <div class="d-flex flex-stack mb-3">
                                                        <!--begin::Accountname-->
                                                        <div class="fw-semibold pe-10 text-gray-600 fs-7">
                                                            <div class="form-group">
                                                                <input type="text" name="coupon" id="coupon"
                                                                    class="form-control form-control-sm"
                                                                    placeholder="Coupon Code">
                                                            </div>
                                                        </div>
                                                        <!--end::Accountname-->

                                                        <!--begin::Label-->
                                                        <div class="text-end fw-bold fs-6 text-gray-800">
                                                            <button type="button" id="couponBtn"
                                                                class="btn btn-primary btn-sm">Apply</button>
                                                        </div>
                                                        <!--end::Label-->
                                                    </div>

                                                    <div class="d-flex flex-stack">
                                                        <!--begin::Code-->
                                                        <div class="fw-semibold pe-10 text-gray-600 fs-7">Total</div>
                                                        <!--end::Code-->

                                                        <!--begin::Label-->
                                                        <div class="text-end fw-bold fs-6 text-gray-800">
                                                            ${{ $totalPrice }}</div>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Section-->
                                            </div>
                                            <!--end::Container-->

                                            <!--begin::Container-->
                                            <div class="card pt-10">
                                                @if (session('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                <form action="{{ url('charge') }}" method="post">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-sm-4">
                                                            <input type="hidden" name="email"
                                                                value="{{ $booking->userData->email }}" />
                                                            <input type="hidden" name="amount"
                                                                value="{{ $totalPrice }}" />
                                                            <input type="hidden" name="bookingID"
                                                                value="{{ $booking->id }}" />
                                                            <!--begin::Input group-->
                                                            <div class="input-group mb-5">
                                                                <input type="number" min="1" class="form-control"
                                                                    placeholder="Card Number" name="cc_number"
                                                                    id="cc_number" required />
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                        <div class="col-sm-6">

                                                            <!--begin::Input group-->
                                                            <div class="input-group mb-5">
                                                                <input type="month" class="form-control"
                                                                    name="expiry_month" placeholder="Expiry Month"
                                                                    required />
                                                                <input type="number" class="form-control" name="cvv"
                                                                    placeholder="CVV" required />
                                                            </div>
                                                            <!--end::Input group-->
                                                        </div>
                                                        <div class="col-sm-2 text-end">
                                                            <button type="submit" id="pay_button"
                                                                class="btn btn-primary">Pay
                                                                {{ $totalPrice }}</button>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                            <!--end::Container-->
                                        </div>
                                        <!--end::Content-->
                                    </div>
                                    <!--end::Wrapper-->
                                </div>
                                <!--end::Invoice 2 content-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Layout-->
                    </div>
                    <!--end::Body-->
                </div>
                {{-- <h2>Payment for Booking #{{ $booking->id }}</h2>
                <p>Estimated Price: ${{ $price }}</p>
                <p>Booking Fee: $3.50</p>
                <p>Credit Card Fee: $3.75</p>
                <p>Total Price: ${{ $totalPrice }}</p>

                <form action="{{ route('booking.processPayment', $booking->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="coupon">Apply Coupon</label>
                        <input type="text" name="coupon" id="coupon" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Pay Now</button>
                </form> --}}
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
@section('script')
    <script>
        function validateCreditCardNumber(cardNumber) {
            // Remove all non-digit characters
            cardNumber = cardNumber.replace(/\D/g, '');

            // Implement the Luhn algorithm
            let sum = 0;
            let shouldDouble = false;

            for (let i = cardNumber.length - 1; i >= 0; i--) {
                let digit = parseInt(cardNumber.charAt(i));

                if (shouldDouble) {
                    digit *= 2;
                    if (digit > 9) {
                        digit -= 9;
                    }
                }

                sum += digit;
                shouldDouble = !shouldDouble;
            }

            return sum % 10 === 0;
        }

        document.getElementById('cc_number').addEventListener('input', function() {
            const cardNumber = this.value;
            const isValid = validateCreditCardNumber(cardNumber);
            document.getElementById('pay_button').disabled = !isValid;
        });
    </script>
@endsection
