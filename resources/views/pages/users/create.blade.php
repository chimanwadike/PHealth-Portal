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

                //Code for getting lgas upon state selection change
                $("#state").change(function () {
                    var state = $(this).val();

                    var lga = document.getElementById("lga").value;

                    var html = [];

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route("ajax.lga") }}',
                        type: "POST",
                        data: {state : state},
                        dataType: "json",
                        success: function(json_data){

                            if(json_data.length != 0){
                                html.push('<option value = "">Select LGA</option>');
                                //loop through the array
                                for (i in json_data) {//begin for loop
                                    if(i == lga){
                                        html.push("<option selected value = '" + i + "'>" + json_data[i] + "</option>");
                                        continue;
                                    }
                                    html.push("<option value = '" + i + "'>" + json_data[i] + "</option>");
                                }//end for loop
                            }else{
                                html.push('<option value = "">Select state first</option>');
                            }
                            //add the option values to the select list with an id of lga
                            document.getElementById("lga").innerHTML = html.join('');
                        },
                    });
                });

                $("#lga").change(function () {
                    var lga = $(this).val();
                    var facility = document.getElementById("facility").value;

                    var html_fac = [];

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: '{{ route("ajax.facilities") }}',
                        type: "POST",
                        data: {lga : lga},
                        dataType: "json",
                        success: function(json_data){
                            console.log(json_data)

                            if(json_data.length != 0){
                                html_fac.push('<option value = "">Select Facility</option>');
                                //loop through the array
                                for (i in json_data) {//begin for loop
                                    if(i == facility){
                                        html_fac.push("<option selected value = '" + i + "'>" + json_data[i] + "</option>");
                                        continue;
                                    }
                                    html_fac.push("<option value = '" + i + "'>" + json_data[i] + "</option>");
                                }//end for loop
                            }else{
                                html_fac.push('<option value = "">Select LGA first</option>');
                            }
                            //add the option values to the select list with an id of lga
                            document.getElementById("facility").innerHTML = html_fac.join('');
                        },
                    });

                });

                $("#state").trigger("change");


            }
        });
    </script>
@endsection
