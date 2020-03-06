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
        <div class="container">
            <div class="kt-content kt-grid__item kt-grid__item--fluid">
                <div class="row">
                    <div class="kt-portlet kt-portlet--mobile">
                        @if(auth()->user()->can('add_administrator'))
                            @if(count($admin_users) > 0)
                                <div class="kt-portlet__head kt-portlet__head--lg">
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper">
                                            <div class="kt-portlet__head-actions">
                                                <a href="{{route('employees.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                                    <i class="la la-plus"></i>
                                                    New Staff
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endif

                        <div class="col-md-12">
                            @if(count($admin_users) > 0)
                                <table class="table table-striped- table-bordered table-hover table-checkable mt-2" id="datatable">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Staff Information</th>
                                            @if(auth()->user()->hasAnyPermission('read_administrator'))
                                                <th class="text-center">Actions</th>
                                            @endif
                                        </tr>
                                    </thead>

                                    <tbody>
                                        @foreach($admin_users as $employee)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img style="width: 80px; height: 80px:" class="kt-img-rounded" alt="Pic" src="{{ $employee->user_info->user_profile }}">

                                                    <h4 class="d-inline">{{ $employee->user_info->name }}</h4>
                                                    <h6 class="text-muted">{{ $employee->user_info->email }}</h6>
                                                    <h6 class="text-muted">{{ $employee->phone }}</h6>
                                                </td>

                                                {{-- @if(auth()->user()->hasAnyPermission('read_administrator')) --}}
                                                    <td class="text-center">
                                                        @if((auth()->user()->owner->id == $employee->id && auth()->user()->hasAnyPermission('update_self_profile')) || (auth()->user()->owner->id != $employee->id && auth()->user()->hasAnyPermission('update_other_administrators_profile')))
                                                            <a type="button" href="{{ route("employees.show", $employee->id) }}" class="btn btn-primary btn-icon">
                                                                <i class="fa fa-edit">
                                                                </i>
                                                            </a>
                                                        @endif

                                                        @if(auth()->user()->owner->id == $employee->id || auth()->user()->can('read_administrator'))
                                                            <a type="button" href="{{ route('others_profile', $employee->user_info->id) }}" class="btn btn-primary btn-icon">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        @endif

                                                        @if(auth()->user()->id != $employee->user_info->id)
                                                            @if(auth()->user()->hasAnyPermission(['activate_deactivate_administrator']))
                                                                {{-- Use the user active/inactive status to detect which icon to show --}}
                                                                @if($employee->user_info->is_active == 1)
                                                                    <a type="button" href="" class="btn btn-warning btn-icon active_employee" data-userId="{{ $employee->user_info->id }}">
                                                                        <i class="fa fa-lock"></i>
                                                                    </a>
                                                                @elseif($employee->user_info->is_active == 0)
                                                                    <a type="button" href="" class="btn btn-success btn-icon active_employee" data-userId="{{ $employee->user_info->id }}">
                                                                        <i class="fa fa-lock"></i>
                                                                    </a>
                                                                @endif
                                                            @endif    
                                                        @endif
                                                    </td>
                                                {{-- @endif --}}
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            @else
                                <div class="empty-state text-center my-3">
                                    @include('pages.partials.empty')
                                    <h3 class="text-muted my-3">
                                        No staff yet!
                                    </h3>

                                    {{-- @if(auth()->user()->can('add_administrator')) --}}
                                        <a href="{{route('employees.create')}}" class="btn btn-brand btn-elevate btn-icon-sm">
                                            <i class="la la-plus"></i>
                                            New Staff
                                        </a>
                                    {{-- @endif --}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>          
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                search: true,
                paging: false,
                info: false
            });

            //Code that handles the activation and deactivation of administrator account
            $(".active_employee").on('click',(function(e) {
                e.preventDefault()

                var user_id = $(this).attr("data-userId");

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: user_id+"/active",
                    type: "GET",
                    traditional: true,
                    contentType: false,
                    cache: false,
                    processData:false,
                    // data: new FormData(this),
                    success: function(res){
                        location.reload();
                    },
                    error: function(jqXhr){
                        if( jqXhr.status === 401 ) //redirect if not authenticated user.
                            $( location ).prop( 'pathname', 'login' );
                         else {
                            //Show sweet alert
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 4000
                            });

                            Toast.fire({
                                type: 'error',
                                html: "<h3 class='text-success ml-3'>Staff information update failed, please try again.<h3>"
                            })
                        }
                    }
                });  
            }));
        });
    </script>
@endsection