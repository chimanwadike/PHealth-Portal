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
	                                <h3>Analytics Dashboard</h3>
	                            </div>
	                        </div>
	                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                            <ul class="breadcome-menu">
	                                <li>
	                                    <a href="{{ route('home') }}">Home</a>
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
    <div class="analytics-sparkle-area mt-0">
        <div class="container-fluid">
            <div class="row">

            </div>
        </div>
    </div>
@endsection
