<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard | {{ env("APP_NAME") }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
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
                        <a href="index.html">
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
        </div>

        @yield("content")

        @include("pages.partials.footer")
    </div>

    @include("pages.partials.script")
    @yield("script")
</body>

</html>