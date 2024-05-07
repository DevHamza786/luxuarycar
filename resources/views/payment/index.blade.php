@extends('layouts.app')
@section('content')
    <!--begin::Content-->
    <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
        <!--begin::Post-->
        <div class="post d-flex flex-column-fluid" id="kt_post">
            <!--begin::Container-->
            <div id="kt_content_container" class="container-xxl">
                <!--begin::Row-->
                <div class="row gy-5 g-xl-8">
                    <!--begin::Col-->
                    <div class="col-xl-12 m-0 bg-white p-4 border rounded">
                        <ul class="nav nav-tabs nav-line-tabs mb-5 fs-6">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#kt_tab_pane_1">Black Luxury</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " data-bs-toggle="tab" href="#kt_tab_pane_2">Ultra Luxury</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-bs-toggle="tab" href="#kt_tab_pane_3">SUV Luxury</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1" role="tabpanel">
                                <div class="d-flex flex-column flex-md-row rounded border p-2">
                                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 mb-3 mb-md-0 fs-6"
                                        role="tablist">
                                        <li class="nav-item w-md-200px me-0" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#kt_vtab_pane_1"
                                                aria-selected="true" role="tab">Rate in Manhattan</a>
                                        </li>
                                        <li class="nav-item w-md-200px me-0" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_2"
                                                aria-selected="false" role="tab" tabindex="-1">Rate in Manhattan
                                                Hourly</a>
                                        </li>
                                        <li class="nav-item w-md-200px" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#kt_vtab_pane_3"
                                                aria-selected="false" role="tab" tabindex="-1">Rate out of
                                                Manhattan</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="kt_vtab_pane_1" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}" style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">Black Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_passenger" value="4" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm" type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}" style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Black Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Black Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="kt_vtab_pane_2" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">Black Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_passenger" value="4" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Black Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Black Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="kt_vtab_pane_3" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">Black Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_passenger" value="4" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Black Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Black Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_2" role="tabpanel">
                                <div class="d-flex flex-column flex-md-row rounded border p-2">

                                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 mb-3 mb-md-0 fs-6"
                                        role="tablist">
                                        <li class="nav-item w-md-200px me-0" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#ultratabone"
                                                aria-selected="true" role="tab">Rate in Manhattan</a>
                                        </li>
                                        <li class="nav-item w-md-200px me-0" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#ultratabtwo"
                                                aria-selected="false" role="tab" tabindex="-1">Rate in Manhattan
                                                Hourly</a>
                                        </li>
                                        <li class="nav-item w-md-200px" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#ultratabthree"
                                                aria-selected="false" role="tab" tabindex="-1">Rate out of
                                                Manhattan</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="ultratabone" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">Ultra Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="4" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Ultra Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Ultra Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="ultratabtwo" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">Ultra Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="4" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Ultra Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Ultra Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="ultratabthree" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">Ultra Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_passenger" value="4" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Ultra Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">Ultra Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="tab-pane fade" id="kt_tab_pane_3" role="tabpanel">
                                <div class="d-flex flex-column flex-md-row rounded border p-2">

                                    <ul class="nav nav-tabs nav-pills border-0 flex-row flex-md-column me-5 mb-3 mb-md-0 fs-6"
                                        role="tablist">
                                        <li class="nav-item w-md-200px me-0" role="presentation">
                                            <a class="nav-link active" data-bs-toggle="tab" href="#suvtabone"
                                                aria-selected="true" role="tab">Rate in Manhattan</a>
                                        </li>
                                        <li class="nav-item w-md-200px me-0" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#suvtabtwo"
                                                aria-selected="false" role="tab" tabindex="-1">Rate in Manhattan
                                                Hourly</a>
                                        </li>
                                        <li class="nav-item w-md-200px" role="presentation">
                                            <a class="nav-link" data-bs-toggle="tab" href="#suvtabthree"
                                                aria-selected="false" role="tab" tabindex="-1">Rate out of
                                                Manhattan</a>
                                        </li>
                                    </ul>

                                    <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade active show" id="suvtabone" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">SUV Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="4" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">SUV Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">SUV Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="suvtabtwo" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">SUV Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="4" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">SUV Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">SUV Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="suvtabthree" role="tabpanel">
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4">
                                                    {{ session('success') }}
                                                </div>
                                            @endif

                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                @endphp
                                                @csrf

                                                <h4 class="mt-4 mx-4">SUV Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_passenger" value="4" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">SUV Luxury 5 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="5" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @php
                                                    $payment = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                @csrf
                                                <h4 class="mt-4 mx-4">SUV Luxury 6 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="no_pessenger" value="6" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <div class="row m-4">

                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            step="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any"
                                                            min="0.1"
                                                            value="{{ isset($payment) ? $payment->pricepermin : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per minutes will apply on extre time
                                                            of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-4 text-end mt-8">
                                                        <button class="btn btn-primary btn-sm"
                                                            type="submit">Save</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Row-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Post-->
    </div>
    <!--end::Content-->
@endsection
