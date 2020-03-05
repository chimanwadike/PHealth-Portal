@extends('pages.layouts.login_layout', ['title' => 'Reset Password'])

@section('content')
    <div class="text-center m-b-md custom-login">
        <h3>Reset Password</h3>
        <p>Enter your email to reset your password:</p>
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif
    </div>

    <div class="content-error">
        <div class="hpanel">
            <div class="panel-body">
                <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                    @csrf

                    <div class="form-group state-error">
                        <label class="control-label" for="email">Email (Username)</label>
                        <input id="email" type="email" placeholder="example@gmail.com" value="{{ old('email') }}" name="email" class="form-control invalid{{ $errors->has('email') ? ' invalid' : '' }}" required autofocus>
                        @if ($errors->has('email'))
                            <strong class="text-danger">{{ $errors->first('email') }}</strong>
                        @endif
                    </div>

                    <div class="row">
                        <div class="col-xs-6">
                            <button type="submit" class="btn btn-success btn-block loginbtn">Send Password Reset Link</button>
                        </div>

                        <div class="col-xs-6">
                            <a class="btn btn-default btn-block" style="margin: 0px; padding: 7px;" href="{{ route('login') }}">Cancel</a>
                        </div>
                    </div>  
                </form>
            </div>
        </div>
    </div>



    <form method="POST" action="{{ route('password.request') }}" aria-label="{{ __('Reset Password') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

        <div class="form-group row">
            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

            <div class="col-md-6">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $email ?? old('email') }}" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

            <div class="col-md-6">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary">
                    {{ __('Reset Password') }}
                </button>
            </div>
        </div>
    </form>
@endsection
