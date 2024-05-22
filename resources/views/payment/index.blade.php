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
                                        @if (session('success'))
                                            <div class="alert alert-success mx-4 success-alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif
                                        @if (session('error'))
                                            <div class="alert alert-danger mx-4 error-alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <div class="tab-pane fade active show" id="kt_vtab_pane_1" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}" style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp

                                                <!-- Black Luxury 4 Passenger -->
                                                <h4 class="mt-4 mx-4">Black Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Black Luxury 5 Passenger -->
                                                <h4 class="mt-4 mx-4">Black Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Black Luxury 6 Passenger -->
                                                <h4 class="mt-4 mx-4">Black Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="tab-pane fade" id="kt_vtab_pane_2" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                <h4 class="mt-4 mx-4">Black Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />

                                                    </div>
                                                </div>
                                                <hr>
                                                <h4 class="mt-4 mx-4">Black Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4 class="mt-4 mx-4">Black Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="kt_vtab_pane_3" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'Black Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp

                                                <!-- Black Luxury 4 Passenger -->
                                                <h4 class="mt-4 mx-4">Black Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Black Luxury" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of
                                                            ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Black Luxury 5 Passenger -->
                                                <h4 class="mt-4 mx-4">Black Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Black Luxury 6 Passenger -->
                                                <h4 class="mt-4 mx-4">Black Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
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
                                        @if (session('success'))
                                            <div class="alert alert-success mx-4 success-alert">
                                                {{ session('success') }}
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class="alert alert-danger mx-4 error-alert">
                                                {{ session('error') }}
                                            </div>
                                        @endif
                                        <div class="tab-pane fade active show" id="ultratabone" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp

                                                <!-- Ultra Luxury 4 Passenger -->
                                                <h4 class="mt-4 mx-4">Ultra Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of
                                                            ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Ultra Luxury 5 Passenger -->
                                                <h4 class="mt-4 mx-4">Ultra Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Ultra Luxury 6 Passenger -->
                                                <h4 class="mt-4 mx-4">Ultra Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="ultratabtwo" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}" style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                <h4 class="mt-4 mx-4">Ultra Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />

                                                    </div>
                                                </div>
                                                <hr>
                                                <h4 class="mt-4 mx-4">Ultra Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4 class="mt-4 mx-4">Ultra Luxury Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="tab-pane fade" id="ultratabthree" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'Ultra Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp

                                                <!-- Ultra Luxury 4 Passenger -->
                                                <h4 class="mt-4 mx-4">Ultra Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="Ultra Luxury" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of
                                                            ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Ultra Luxury 5 Passenger -->
                                                <h4 class="mt-4 mx-4">Ultra Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- Ultra Luxury 6 Passenger -->
                                                <h4 class="mt-4 mx-4">Ultra Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
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
                                            @if (session('success'))
                                                <div class="alert alert-success mx-4 success-alert">
                                                    {{ session('success') }}
                                                </div>
                                            @endif
                                            @if (session('error'))
                                                <div class="alert alert-danger mx-4 error-alert">
                                                    {{ session('error') }}
                                                </div>
                                            @endif
                                        <div class="tab-pane fade active show" id="suvtabone" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}" style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mr')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp

                                                <!-- SUV Luxury 4 Passenger -->
                                                <h4 class="mt-4 mx-4">SUV Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="mode" value="mr" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- SUV Luxury 5 Passenger -->
                                                <h4 class="mt-4 mx-4">SUV Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- SUV Luxury 6 Passenger -->
                                                <h4 class="mt-4 mx-4">SUV Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="tab-pane fade" id="suvtabtwo" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}"
                                                style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mrh')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp
                                                <h4 class="mt-4 mx-4">SUV Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="mode" value="mrh" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />

                                                    </div>
                                                </div>
                                                <hr>
                                                <h4 class="mt-4 mx-4">SUV Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <hr>
                                                <h4 class="mt-4 mx-4">SUV Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                        <!--begin::Hint-->
                                                        <div class="form-text">Price per miles will apply on extre time of
                                                            ride</div>
                                                        <!--end::Hint-->
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
                                                </div>
                                            </form>

                                        </div>

                                        <div class="tab-pane fade" id="suvtabthree" role="tabpanel">

                                            <form method="POST" action="{{ route('payment.store') }}" style="width: 950px">
                                                @csrf
                                                @php
                                                    $payment4 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '4')
                                                        ->first();
                                                    $payment5 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '5')
                                                        ->first();
                                                    $payment6 = $paymentSetting
                                                        ->where('car_category', 'SUV Luxury')
                                                        ->where('mode', 'mor')
                                                        ->where('no_pessenger', '6')
                                                        ->first();
                                                @endphp

                                                <!-- SUV Luxury 4 Passenger -->
                                                <h4 class="mt-4 mx-4">SUV Luxury 4 Passenger</h4>
                                                <input type="hidden" name="car_category" value="SUV Luxury" />
                                                <input type="hidden" name="mode" value="mor" />
                                                <input type="hidden" name="payment_id_4"
                                                    value="{{ $payment4 ? $payment4->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_4"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment4 ? $payment4->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- SUV Luxury 5 Passenger -->
                                                <h4 class="mt-4 mx-4">SUV Luxury 5 Passenger</h4>
                                                <input type="hidden" name="payment_id_5"
                                                    value="{{ $payment5 ? $payment5->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_5"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment5 ? $payment5->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <!-- SUV Luxury 6 Passenger -->
                                                <h4 class="mt-4 mx-4">SUV Luxury 6 Passenger</h4>
                                                <input type="hidden" name="payment_id_6"
                                                    value="{{ $payment6 ? $payment6->id : '' }}" />
                                                <div class="row m-4">
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Miles</span></label>
                                                        <input type="number" name="pricepermiles_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per miles" step="any" step="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermiles : '' }}"
                                                            required />
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Minutes</span></label>
                                                        <input type="number" name="pricepermin_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per minutes" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->pricepermin : '' }}"
                                                            required />
                                                        <div class="form-text">Price per minutes will apply on extra time
                                                            of ride</div>
                                                    </div>
                                                    <div class="col-4">
                                                        <label class="fw-bold fs-6"><span class="required">Price Per
                                                                Hour</span></label>
                                                        <input type="number" name="priceperhour_6"
                                                            class="form-control form-control-lg"
                                                            placeholder="Price per hour" step="any" min="0.1"
                                                            value="{{ $payment6 ? $payment6->priceperhour : '' }}"
                                                            required />
                                                        <div class="form-text">Price per hour will apply on extra time of
                                                            ride</div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-sm" type="submit">Update</button>
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
@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Success message
            var successAlerts = document.getElementsByClassName('success-alert');
            if (successAlerts.length > 0) {
                for (var i = 0; i < successAlerts.length; i++) {
                    (function(alert) {
                        setTimeout(function() {
                            alert.style.transition = 'opacity 0.5s ease';
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.style.display = 'none';
                            }, 500); // Wait for the transition to complete before hiding
                        }, 3000); // 3 seconds before starting the fade out
                    })(successAlerts[i]);
                }
            }

            // Error message
            var errorAlerts = document.getElementsByClassName('error-alert');
            if (errorAlerts.length > 0) {
                for (var i = 0; i < errorAlerts.length; i++) {
                    (function(alert) {
                        setTimeout(function() {
                            alert.style.transition = 'opacity 0.5s ease';
                            alert.style.opacity = '0';
                            setTimeout(function() {
                                alert.style.display = 'none';
                            }, 500); // Wait for the transition to complete before hiding
                        }, 3000); // 3 seconds before starting the fade out
                    })(errorAlerts[i]);
                }
            }
        });
    </script>
@endsection
