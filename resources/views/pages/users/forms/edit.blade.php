<form class="kt-form" method="POST" novalidate="novalidate" action="{{ route('employees.update', $employee->id) }}">
    @csrf
    {{method_field('PUT')}}  

    <div class="kt-portlet__body">
        <div class="kt-section kt-section--first">
            <div class="form-row mb-3">
                <div class="col">
                    <label>Full Name:</label>
                    <input required name="name" value='{{ old("name", $employee->user_info->name) }}' type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Full Name" autofocus>
                    @error('name')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <label>Staff Number:</label>
                    <input required name="employee_id" value="{{ old('employee_id', $employee->employee_id) }}" type="text" class="form-control @error('employee_id') is-invalid @enderror" placeholder="">
                    @error('employee_id')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row mb-3">
                <div class="col">
                    <label>Role</label>
                    <select required class="form-control m-select2 @error('role') is-invalid @enderror" id="kt_select2_role" name="role">
                        <option></option>
                        @foreach($roles as $role)
                            <option @if (old('role', $employee->user_info->getRoleNames()->first()) == $role->name) {{ 'selected' }} @endif value="{{ $role->name }}">{{ $role->display_name }}</option>
                            }
                        @endforeach
                    </select>
                    @error('role')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <label>Phone Number</label>
                    <input required name="phone" value="{{ old('phone', $employee->phone) }}" type="text" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" autofocus>
                    @error('phone')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label>Email Address:</label>
                    <input required name="email" value="{{ old('email', $employee->user_info->email) }}" type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email Address" autofocus>
                    @error('email')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>

                <div class="col">
                    <div class="form-group">
                        <label>Gender:</label>
                        <select required class="form-control m-select2 @error('sex') is-invalid @enderror" id="kt_select2_sex" name="sex">
                            <option></option>
                            <option value="male" @if(old("sex", $employee->sex) == "male") {{ "selected" }} @endif>Male</option>
                            <option value="female" @if(old("sex", $employee->sex) == "female") {{ "selected" }} @endif>Female</option>
                        </select>
                        @error('sex')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="form-row">
                <div class="col">
                    <label>Address</label>

                    <textarea required class="form-control @error('address') is-invalid @enderror" name="address">{{ old('address', $employee->address) }}</textarea>
                    @error('address')
                        <div class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror
                </div>
            </div>
        </div>
    </div>

    <div class="kt-portlet__foot">
        <div class="kt-form__actions">
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route("employees.index") }}" class="btn btn-secondary">Cancel</a>
        </div>
    </div>
</form>    