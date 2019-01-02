@extends('auth.layouts.auth')

@section('authdata')
    <div class="login">
        <h1>Register</h1>
        <form role="form" method="POST" action="{{ url('/register') }}">
            {!! csrf_field() !!}

            <input id="name" name="name" type="text" class="{{ $errors->has('name') ? ' is-invalid' : '' }}"
                   placeholder="Name" required="required" value="" >
            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif

            <input id="email" name="email" type="email" class="{{ $errors->has('email') ? ' is-invalid' : '' }}"
                   placeholder="Email" required="required" value=""/>
            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif

            <input id="password" name="password" type="password"
                   class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Password"
                   required="required" value=""/>
            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif

            <input id="password_confirmation" name="password_confirmation" type="password"
                   class="{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Confirm Password"
                   required="required" value=""/>
            @if ($errors->has('password_confirmation'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
            @endif

            <button type="submit" class="btn btn-primary btn-block btn-large">{{ __('Register') }}</button>
        </form>
    </div>

@endsection
