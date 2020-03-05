@extends('pages.layouts.login_layout', ['title' => 'Login'])

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
                        <input id="email" type="email" placeholder="example@gmail.com" value="{{ old('email') }}" name="email" class="form-control{{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
                        @if($errors->has('email'))
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

                    <div class="row">
                        <div class="col-xs-6">
                            <div class="checkbox login-checkbox">
                                <label>
                                <input type="checkbox" name="remember" id="remember" class="i-checks" {{ old('remember') ? 'checked' : '' }}> Remember me </label>
                            </div>
                        </div>

                        <div class="col-xs-6 text-right">
                            <a style="background: none; color: black;" href="{{ route('password.request') }}">Forgot Your Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-success btn-block loginbtn">Login</button>
                </form>
            </div>
        </div>
    </div>
@endsection
