@extends('pages.layouts.login_layout', ['title' => 'Reset Password'])

@section('content')
    <div class="text-center m-b-md custom-login">
        <h3>Reset Password</h3>
        <p>Enter details to change password:</p>
    </div>

    <div class="content-error">
        <div class="hpanel">
            <div class="panel-body">
                <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group state-error">
                        <label class="control-label" for="email">Email (Username)</label>
                        <input id="email" type="email" placeholder="example@gmail.com" value="{{ old('email') }}" name="email" class="form-control{{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
                        @if ($errors->has('email'))
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" title="Please enter your password" placeholder="******" required value="" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @if ($errors->has('password'))
                            <strong class="text-danger">{{ $errors->first('password') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password-confirm">Password</label>
                        <input type="password" title="Please enter your password" placeholder="******" required name="password_confirmation" id="password-confirm" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-success btn-block loginbtn">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
@endsection
