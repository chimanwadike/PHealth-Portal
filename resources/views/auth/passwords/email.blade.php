@extends('pages.layouts.login_layout', ['title' => 'Forgot Password'])

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
@endsection