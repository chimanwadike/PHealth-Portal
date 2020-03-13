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
                                    <h3>Clients by Facilities</h3>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                <ul class="breadcome-menu">
                                    <li>
                                        <a href="{{ route("home") }}">Home</a> 
                                        <span class="bread-slash">/</span>
                                    </li>
                                    <li>
                                        <span class="bread-blod">Clients by Facilities</span>
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
                        @if(count($facilities) > 0)
                            <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Name</th>
                                        <th>Location</th>
                                        <th>Total Clients</th>
                                        <th class="text-center">Actions</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach($facilities as $facility)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                {{ $facility->name }}
                                            </td>

                                            <td>
                                                <span class="d-block">
                                                    State: <span class="text-muted"> {{ $facility->state->state_name }}</span>
                                                </span><br>

                                                <span>
                                                    LGA: <span class="text-muted"> {{ $facility->lga->lga_name }}</span>
                                                </span>
                                            </td>

                                            <td>
                                                {{ $facility->clients->count() }}
                                            </td>

                                            <td class="text-center">
                                                <a type="button" href="{{ route('clients.facilities.show', $facility->id) }}" class="btn btn-primary btn-icon">
                                                    <i class="fa fa-eye"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                {{ $facilities->links() }}
                            </table>
                        @else
                            <div class="empty-state text-center my-3">
                                @include('pages.partials.empty')
                                <h3 class="text-muted my-3">
                                    No facilities yet!
                                </h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Delete modal start -->
    <div class="modal fade " id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
        <div class="modal-dialog modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title text-center" id="exampleModalLabel">Delete Comfirmation</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form id="delete-form" method="post" id="deleteFormId">
                        {{csrf_field()}} 
                        {{method_field('DELETE')}} 
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="facilityid" name="_method" value="DELETE" >
                        </div>
                        
                        <h4 class="text-center">Are you sure you want to delete this data?</h4>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning px-5" data-dismiss="modal">No</button>
                            <button type="submit" class="btn btn-success px-5">Yes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Delete modal end -->
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $('#datatable').DataTable({
                search: true,
                paging: false,
                info: false
            });

            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var facility_id = button.data('facilityid') // Extract info from data-* attributes
                var modal = $(this)

                $('#delete-form').attr('action', "facilities/"+facility_id);
            })
        });
    </script>
@endsection