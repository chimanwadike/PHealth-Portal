<div class="product-payment-inner-st">
    <div class="mb-2">
        <a type="button" href="{{route('spokes.create')}}" class="btn btn-success btn-icon">
            <i class="fa fa-plus"></i>
            New Spoke Site
        </a>
    </div>


    @if(count($facility->spokes) > 0)
        <table class="table table-striped- table-bordered table-hover table-checkable" id="datatable">
            <thead>
            <tr>
                <th>SN</th>
                <th>Name</th>
                <th>Code</th>
                <th>Contact Person</th>
                <th>Location</th>
{{--                <th>Created By</th>--}}
{{--                <th class="text-center">Actions</th>--}}
            </tr>
            </thead>

            <tbody>
            @foreach($facility->spokes as $spoke)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        {{ $spoke->name }}
                    </td>

                    <td>
                        {{ $spoke->code }}
                    </td>

                    <td>
                                                <span class="d-block">
                                                    Name: <span class="text-muted"> {{ $spoke->contact_person_name }}</span>
                                                </span><br>

                        <span>
                                                    Phone: <span class="text-muted"> {{ $spoke->contact_person_phone }}</span>
                                                </span>
                    </td>

                    <td>
                                                <span class="d-block">
                                                    State: <span class="text-muted"> {{ $spoke->facility->state->state_name }}</span>
                                                </span><br>

                        <span>
                                                    LGA: <span class="text-muted"> {{ $spoke->facility->lga->lga_name }}</span>
                                                </span>
                    </td>

{{--                    <td class="text-center">--}}
{{--                        <a type="button" href="{{ route('facilities.edit', $facility->id) }}" title="Edit Facility / Spokes"  class="btn btn-primary btn-icon">--}}
{{--                            <i class="fa fa-edit"></i>--}}
{{--                        </a>--}}

{{--                        <a type="button" href="" class="btn btn-danger btn-icon" data-toggle="modal" data-target="#deleteModal" href="#" role="button" data-facilityId="{{ $facility->id }}"><i class="fa fa-trash"></i></a>--}}
{{--                    </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state text-center my-3">
            @include('pages.partials.empty')
            <h3 class="text-muted my-3">
                No spoke sites yet!
            </h3>

            <a type="button" href="{{route('spokes.create')}}" class="btn btn-success btn-icon">
                <i class="fa fa-plus"></i>
                New Spoke Site
            </a>
        </div>
    @endif
</div>
