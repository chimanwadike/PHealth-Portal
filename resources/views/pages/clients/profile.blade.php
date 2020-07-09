@extends('pages.layouts.layout')

@section('page-title')
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
                                <div class="breadcome-heading">
                                    <h3>{{ $client->firstname }} {{ $client->surname }}</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li>
                                        <a href="{{ route("home") }}">Home</a>
                                        <span class="bread-slash">/</span>
                                    </li>
                                    <li>
                                        <span class="bread-blod">Information</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="single-pro-review-area mt-t-30 mg-b-15">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">
                    <div class="profile-info-inner">
                        <div class="text-center">
                            <img style="width:200px !important; height:200px !important;" class="img-circle" src="{{ asset('storage/avatars/default.png') }}" alt=""/>
                        </div>

                        <div class="profile-details-hr">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-3">
                                    <div class="address-hr">
                                        <p>
                                            <b>Name</b>
                                            <br /> {{$client->firstname}} {{$client->surname}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-3">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p>
                                            <b>Gender</b>
                                            <br />   {{ $client->sex == "Select Gender" ? "" : ucfirst($client->sex) }} {{ ucfirst($client->sex) }}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-3">
                                    <div class="address-hr">
                                        <p>
                                            <b>Age</b>
                                            <br /> {{$client->age}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-3">
                                    <div class="address-hr">
                                        <p>
                                            <b>Date of Birth:</b>
                                            <br /> {{ $client->date_of_birth }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p>
                                            <b>Phone Number</b>
                                            <br /> {{$client->phone_number}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p>
                                            <b>Services</b>
                                            <br /> {{ ucfirst($client->services) }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-4">
                                    <div class="address-hr">
                                        <p>
                                            <b>Facility</b>
                                            <br /> {{$client->facility->name}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-4">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p>
                                            <b>Facility State</b>
                                            <br /> {{ $client->facility->state->state_name}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-4">
                                    <div class="address-hr">
                                        <p>
                                            <b>Facility LGA</b>
                                            <br /> {{$client->facility->lga->lga_name}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr">
                                        <p>
                                            <b>State of Origin</b>
                                            <br /> {{$client->client_state->state_name}}
                                        </p>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-6">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p>
                                            <b>Lga of Origin</b>
                                            <br /> {{$client->client_lga->lga_name}}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="address-hr tb-sm-res-d-n dps-tb-ntn">
                                        <p>
                                            <b>Address</b>
                                            <br /> {{$client->address}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
