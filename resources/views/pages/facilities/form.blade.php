<form method="POST" novalidate="novalidate" action="{{ (isset($facility)) ? route('facilities.update', $facility->id):route('facilities.store') }}">
    @csrf
    {{ (isset($facility)) ? method_field('PUT'):"" }}

    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
            <label>Name</label>
            <input required name="name" value='{{ old("name", (isset($facility)) ? $facility->name : "") }}' type="text" class="form-control" {{isset($facility) ? "readonly" : ""}} placeholder="Facility Name" autofocus>

            @if($errors->has('name'))
                <strong class="text-danger">{{ $errors->first('name') }}</strong>
            @endif
        </div>

        <div class="col-lg-6 col-md-6 col-xs-12 mt-3">
            <label>Code</label>
            <input required name="code" value='{{ old("code", (isset($facility)) ? $facility->code : "") }}' type="text" class="form-control" {{isset($facility) ? "readonly" : ""}} placeholder="Facility Code" autofocus>

            @if($errors->has('code'))
                <strong class="text-danger">{{ $errors->first('code') }}</strong>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
            <label>Contact Person's Name</label>
            <input required name="contact_person_name" value='{{ old("contact_person_name", (isset($facility)) ? $facility->contact_person_name : "") }}' type="text" class="form-control" placeholder="Contact Person's Name" autofocus>

            @if($errors->has('contact_person_name'))
                <strong class="text-danger">{{ $errors->first('contact_person_name') }}</strong>
            @endif
        </div>

        <div class="col-lg-6 col-md-6 col-xs-12 mt-3">
            <label>Contact Person's Phone</label>
            <input required name="contact_person_phone" value='{{ old("contact_person_phone", (isset($facility)) ? $facility->contact_person_phone : "") }}' type="text" class="form-control" placeholder="Contact Person's Phone" autofocus>

            @if($errors->has('contact_person_phone'))
                <strong class="text-danger">{{ $errors->first('contact_person_phone') }}</strong>
            @endif
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
            <label>State</label>
            <select id="state" name="state_code" class="form-control" {{isset($facility) ? "readonly" : ""}}>
                <option value=''>Select State</option>
                @foreach($states as $state)
                  <option value="{{ $state->state_code }}" @if(old('state_code', (isset($facility)) ? $facility->state_code : "") == $state->state_code) {{ 'selected' }} @endif>{{ $state->state_name }}</option>
                @endforeach
            </select>

            @if($errors->has('state_code'))
                <strong class="text-danger">{{ $errors->first('state_code') }}</strong>
            @endif
        </div>

        <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
            <label>LGA</label>
            <select id="lga" name="lga_code" class="form-control" {{isset($facility) ? "readonly" : ""}}>
                @if(old('lga_code', (isset($facility)) ? $facility->lga_code : ""))
                    <option selected value='{{ old('lga_code', (isset($facility)) ? $facility->lga_code : "") }}'> {{ old('lga_code', (isset($facility)) ? $facility->lga_code : "") }} </option>
                @else
                    <option selected value=''>Select state first</option>
                @endif
          </select>

            @if($errors->has('lga_code'))
                <strong class="text-danger">{{ $errors->first('lga_code') }}</strong>
            @endif
        </div>
    </div>

    <div class="payment-adress mt-3">
        <button type="submit" class="btn btn-primary">{{ (isset($facility)) ? 'Update':'Create' }}</button>
        <a href="{{ route("facilities.index") }}" class="btn btn-default">Cancel</a>
    </div>
</form>
