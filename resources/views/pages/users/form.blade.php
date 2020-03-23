<form method="POST" novalidate="novalidate" action="{{ (isset($user)) ? route('users.update', $user->id):route('users.store') }}">
    @csrf
    {{ (isset($user)) ? method_field('PUT'):"" }}

    @if(auth()->user()->hasRole(['admin', 'coordinator']))
        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                <label>Full Name:</label>
                <input required name="name" value='{{ old("name", (isset($user)) ? $user->name : "") }}' type="text" class="form-control" placeholder="Full Name" autofocus>

                @if($errors->has('name'))
                    <strong class="text-danger">{{ $errors->first('name') }}</strong>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12 mt-3">
                <label>Sex:</label>
                <select required class="form-control m-select2" id="kt_select2_sex" name="sex">
                    <option></option>
                    <option value="male" @if(old("sex", (isset($user)) ? $user->sex : "") == "male") {{ "selected" }} @endif>Male</option>
                    <option value="female" @if(old("sex", (isset($user)) ? $user->sex : "") == "female") {{ "selected" }} @endif>Female</option>
                </select>
                @if($errors->has('sex'))
                    <strong class="text-danger">{{ $errors->first('sex') }}</strong>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                <label>Email Address:</label>
                <input required name="email" value="{{ old('email', (isset($user)) ? $user->email : "") }}" type="text" class="form-control" placeholder="Email Address" autofocus>
                @if($errors->has('email'))
                    <strong class="text-danger">{{ $errors->first('email') }}</strong>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                <label>Phone Number</label>
                <input required name="phone" value="{{ old('phone', (isset($user)) ? $user->phone : "") }}" type="text" class="form-control" placeholder="Phone" autofocus>
                @if($errors->has('phone'))
                    <strong class="text-danger">{{ $errors->first('phone') }}</strong>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                <label>Address</label>

                <textarea required class="form-control" name="address">{{ old('address', (isset($user)) ? $user->address : "") }}</textarea>
                @if($errors->has('address'))
                    <strong class="text-danger">{{ $errors->first('address') }}</strong>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                <label>Role</label>
                <select required class="form-control m-select2" id="role" name="role">
                    <option></option>
                    @foreach($roles as $role)
                        <option @if(old('role', (isset($user)) ? $user->roles()->first()->id : "") == $role->id) {{ 'selected' }} @endif value="{{ $role->id }}">{{ $role->display_name }}</option>
                    @endforeach
                </select>
                @if($errors->has('role'))
                    <strong class="text-danger">{{ $errors->first('role') }}</strong>
                @endif
            </div>
        </div>

        <div class="row" id="facilities_div">
            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                <label>State</label>
                <select id="state" name="state_code" class="form-control">
                    <option value=''>Select State</option>
                    @foreach($states as $state)
                        <option value="{{ $state->state_code }}" @if(old('state_code', (isset($user->facility)) ? $user->facility->state_code : "") == $state->state_code) {{ 'selected' }} @endif>{{ $state->state_name }}</option>
                    @endforeach
                </select>

                @if($errors->has('state_code'))
                    <strong class="text-danger">{{ $errors->first('state_code') }}</strong>
                @endif
            </div>

            <div class="col-lg-6 col-md-6 col-xs-12 col-sm-12 mt-3">
                <label>LGA</label>
                <select id="lga" name="lga_code" class="form-control">
                    <option selected value=''>Select state first</option>
                        @if(old('lga_code', (isset($user->facility)) ? $user->facility->lga_code : ""))
                            <option selected value='{{ old('lga_code', (isset($user->facility)) ? $user->facility->lga_code : "") }}'> {{ old('lga_name', (isset($user->facility)) ? $user->facility->lga->lga_name : "") }} </option>
                        @else
                            <option selected value=''>Select state first</option>
                        @endif
                </select>

                @if($errors->has('lga_code'))
                    <strong class="text-danger">{{ $errors->first('lga_code') }}</strong>
                @endif
            </div>

            <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12 mt-3 mb-3">
                <label>Facility</label>
                <select required class="form-control m-select2" name="facility" id="facility">
                    @if(isset($user->facility_id))
                        <option value="{{ $user->facility->id }}" selected>{{ $user->facility->name }}</option>
                    @endif
                </select>
                @if($errors->has('facility'))
                    <strong class="text-danger">{{ $errors->first('facility') }}</strong>
                @endif
            </div>
        </div>
    @endif

    <div class="payment-adress mt-3">
        <button type="submit" class="btn btn-primary">{{ (isset($user)) ? 'Update':'Create' }}</button>
        <a href="{{ route("users.index") }}" class="btn btn-default">Cancel</a>
    </div>
</form>
