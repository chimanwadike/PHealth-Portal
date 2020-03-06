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
	                                <h3>Hello World</h3>
	                            </div>
	                        </div>
	                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	                            <ul class="breadcome-menu">
	                                <li>
	                                    <a href="#">Home</a> 
	                                    <span class="bread-slash">/</span>
	                                </li>
	                                <li>
	                                    <span class="bread-blod">Dashboard V.1</span>
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
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input name="headofdepartment" type="text" class="form-control" placeholder="Head of Department">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="form-group">
                            <input name="name" type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <input name="headofdepartment" type="text" class="form-control" placeholder="Head of Department">
                        </div>
                        <div class="form-group">
                            <input name="email" type="email" class="form-control" placeholder="Email">
                        </div>

                        <div class="payment-adress">
                            <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection