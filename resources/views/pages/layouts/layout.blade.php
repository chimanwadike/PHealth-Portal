<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard | {{ env("APP_NAME") }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include("pages.partials.style")
    @yield("style")
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->

    @include("pages.partials.desktop-menu")

    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="{{ route("home") }}">
                            <img class="main-logo" src="{{ asset('img/logo/logo.png') }}" alt="" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="header-advance-area">
            @include("pages.partials.header")

            @include("pages.partials.mobile-menu")

            @yield("page-title")

            @if(Request::is(['clients', 'filter_clients', 'users']))
                <div class="breadcome-area">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="breadcome-list">
                                    <div class="row text-center">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                                            <form action="{{Route('filter.clients')}}" method="post"  class="form-inline" id="filter_client_form">
                                                @csrf
                                                <div class="form-group">
                                                    <select name="state" class="form-control mb-2 mr-3 p-1" required id="state">
                                                        <option value="">Select State</option>
                                                        <option value=10>Delta</option>
                                                        <option value=11>Ebonyi</option>
                                                        <option value=14>Enugu</option>
                                                        <option value=17>Imo</option>
                                                    </select>

                                                    <select name="lga" class="form-control mb-2 mr-3 p-1" id="lga">
                                                        <option value="">Select LGA</option>
                                                    </select>

                                                    <select name="facility" class="form-control mb-2 mr-3 p-1" id="facility">
                                                        <option value="">Select Facility</option>
                                                    </select>

                                                    <select name="sex" class="form-control mb-2 mr-3 p-1" id="sex">
                                                        <option value="">Select Sex</option>
                                                        <option value="Female">Female</option>
                                                        <option value="Male">Male</option>
                                                    </select>

                                                    <select name="result" class="form-control mb-2 mr-3 p-1" id="result">
                                                        <option value="">Select Result</option>
                                                        <option value="Negative">Negative</option>
                                                        <option value="Positive">Positive</option>
                                                    </select>

                                                </div>
                                                <div class="form-group  mb-2 mr-3 p-1">
                                                    <label for="start_date">Start Date</label>
                                                    <input type="date" class="form-control" name="start_date" id="start_date" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group  mb-2 mr-3 p-1">
                                                    <label for="end_date">End Date</label>
                                                    <input type="date" class="form-control" name="end_date" id="end_date" aria-describedby="emailHelp">
                                                </div>
                                                <div class="form-group mb-2 mr-3 p-1">
                                                    <button type="button" class="btn btn-primary" onclick="event.preventDefault(); document.getElementById('filter_client_form').submit();" >Filter Data</button>
                                                </div>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif


        </div>

        @yield("content")

        @include("pages.partials.footer")
    </div>

    @include("pages.partials.script")
    @yield("script")
</body>

</html>
