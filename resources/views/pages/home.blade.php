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
	                                <h3>Periodic Aggregate Report</h3>
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
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    @foreach(auth()->user()->weekly_clients_to_view() as $week)
                        <div class="analytics-sparkle-line reso-mg-b-30 pb-0 pb-0">
                            <div class="analytics-content">
                                <h3>{{ $week['title'] }}</h3>
                                @if($loop->iteration == 1)
                                    <h1><span class="text-danger">{{ $week['count'] }}</span></h1>
                                @else
                                    <h2><span class="text-danger">{{ $week['count'] }}</span></h2>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 pb-0">
                        <div class="analytics-content">
                            <h2>Total clients today</h2>
                            <h1><span class="text-danger">{{ auth()->user()->daily_clients_to_view() }}</span></h1>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    @foreach(auth()->user()->monthly_clients_to_view() as $month)
                        <div class="analytics-sparkle-line reso-mg-b-30 pb-0 pb-0">
                            <div class="analytics-content">
                                <h3>{{ $month['title'] }} ({{ strtoupper($month['month']) }})</h3>

                                @if($loop->iteration == 1)
                                    <h1><span class="text-danger">{{ $month['count'] }}</span></h1>
                                @else
                                    <h2><span class="text-danger">{{ $month['count'] }}</span></h2>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
