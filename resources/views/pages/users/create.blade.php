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
                                    <h3>Add User</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li>
                                        <a href="{{ route("home") }}">Home</a> 
                                        <span class="bread-slash">/</span>
                                    </li>
                                    <li>
                                        <span class="bread-blod">Add User</span>
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
                    <div class="product-payment-inner-st">
                        @include("pages.users.form")
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            //Code to hide and show user selection field based on message type selection
            const type = document.getElementById('role');

            if(type != null){
                if(type.value != "3"){
                    $("#facilities_div").hide();
                }else{
                    $("#facilities_div").show();
                }

                $('#role').change(function(){
                    if(type.value != "3"){
                        $("#facilities_div").hide();
                    }else{
                        $("#facilities_div").show();
                    }
                });
            }
        });
    </script>
@endsection
