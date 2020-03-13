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
                                    <h3>Clients by Users</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li>
                                        <a href="{{ route("home") }}">Home</a> 
                                        <span class="bread-slash">/</span>
                                    </li>
                                    <li>
                                        <span class="bread-blod">Clients by Users</span>
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
                        @if(count($users) > 0)
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>User Information</th>
                                        <th>Total Clients</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                <img style="width:80px; height:80px;" class="img-circle" alt="Pic" src="{{ $user->user_profile }}">

                                                <h4 class="d-inline">{{ $user->name }}</h4>
                                                <h6 class="text-muted">{{ $user->email }}</h6>
                                                <h6 class="text-muted">{{ $user->phone }}</h6>
                                            </td>

                                            <td>
                                                {{ $user->uploaded_clients->count() }}
                                            </td>

                                            <td class="text-center">
                                                <a type="button" href="{{ route('clients.users.show', $user->id) }}" class="btn btn-primary btn-icon">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{ $users->links() }}
                            </table>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('pages.partials.empty')
                                <h3 class="text-muted my-3">
                                    No facility users yet!
                                </h3>
                            </div>
                        @endif
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
        });
    </script>
@endsection