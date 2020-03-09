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
                                    <h3>Clients</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li>
                                        <a href="{{ route("home") }}">Home</a> 
                                        <span class="bread-slash">/</span>
                                    </li>
                                    <li>
                                        <span class="bread-blod">Clients</span>
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
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="product-payment-inner-st">
                        @if(count($clients) > 0)
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Age</th>
                                        <th>Gender</th>
                                        <th>Phone</th>
                                        <th>Facility</th>
                                        <th>Uploaded By</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($clients as $client)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $client->firstname }} {{ $client->surname }}
                                            </td>

                                            <td>
                                                {{ $client->age }}
                                            </td>

                                            <td>
                                                {{ ucfirst($client->sex) }}
                                            </td>

                                            <td>
                                                {{ $client->phone_number }}
                                            </td>

                                            <td>
                                                {{ $client->facility->name }}
                                            </td>

                                            <td>
                                                @if($client->user)
                                                    <a href="{{ route('others_profile', $client->user->id) }}">
                                                        <span class="inline-block">
                                                            <strong> 
                                                                {{ $client->user->name }}
                                                            </strong>
                                                        </span>
                                                    </a>
                                                @else
                                                    <span class="inline-block">
                                                        <strong> 
                                                            Default
                                                        </strong>
                                                    </span>
                                                @endif
                                            </td>

                                            <td class="text-center">
                                                <a type="button" href="{{ route('clients.show', $client->id) }}" class="btn btn-primary btn-icon">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{ $clients->links() }}
                            </table>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('pages.partials.empty')
                                <h3 class="text-muted my-3">
                                    No clients yet!
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
            // $('#datatable').DataTable({
            //     search: true,
            //     paging: false,
            //     info: false
            // });
        });
    </script>
@endsection