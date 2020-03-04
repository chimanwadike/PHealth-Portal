@extends('pages.layouts.login_layout')

@section('content')
    <div class="text-center m-b-md custom-login">
        <h3>Login to Portal</h3>
        <p>Enter your details to access the portal:</p>
    </div>

    <div class="content-error">
        <div class="hpanel">
            <div class="panel-body">
                <form id="loginForm" method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                    @csrf

                    <div class="form-group state-error">
                        <label class="control-label" for="email">Email (Username)</label>
                        <input id="email" type="email" placeholder="example@gmail.com" value="{{ old('email') }}" name="email" class="form-control invalid{{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
                        @if ($errors->has('email'))
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="password">Password</label>
                        <input type="password" title="Please enter your password" placeholder="******" required value="" name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="checkbox login-checkbox">
                        <label>
                        <input type="checkbox" name="remember" id="remember" class="i-checks" {{ old('remember') ? 'checked' : '' }}> Remember me </label>
                        <p class="help-block small">(if this is a private computer)</p>
                    </div>

                    <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                    <a class="btn btn-default btn-block" href="{{ route('password.request') }}">Forgot Your Password?</a>
                </form>
            </div>
        </div>
    </div>
@endsection
