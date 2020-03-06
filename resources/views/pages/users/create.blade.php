@extends('pages.layouts.layout')

@section('content')
    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-subheader__main">
                <h3 class="kt-subheader__title">
                    Staff 
                </h3>

                <span class="kt-subheader__separator kt-hidden"></span>

                <div class="kt-subheader__breadcrumbs">
                    <a href="{{ route("employees.index") }}" class="kt-subheader__breadcrumbs-home">
                        <i class="flaticon2-shelter"></i>
                    </a>

                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a href="{{ route("home") }}" class="kt-subheader__breadcrumbs-link">
                        Dashboards 
                    </a>

                    <span class="kt-subheader__breadcrumbs-separator"></span>
                    <a class="kt-subheader__breadcrumbs-link">
                        System
                    </a>

                    <span class="kt-subheader__breadcrumbs-separator active"></span>
                    <a class="kt-subheader__breadcrumbs-link text-success cursor-default">
                        Staff
                    </a>
                </div>
            </div>
        </div>

        <!-- begin:: Content -->
        <div class="kt-content  kt-grid__item kt-grid__item--fluid" id="kt_content">
            <div class="row">
                <div class="col-md-10 offset-md-0">
                    <div class="kt-portlet kt-portlet--tab">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <span class="kt-portlet__head-icon kt-hide">
                                    <i class="la la-gear"></i>
                                </span>
                                <h3 class="kt-portlet__head-title">
                                    Add new staff
                                </h3>
                            </div>
                        </div>

                        <div class="kt-portlet__body">
                            <div class="kt-section">
                                @include("pages.employee.forms.create")
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
