@extends('auth.layouts.auth')

@section('authdata')
    <div class="login">
        <h1>Login</h1>
        <form method="post" action="{{ route('login') }}">
            @csrf
            <input id="email" name="email" type="email" placeholder="email" required="required"/>
            <input id="password" name="password" type="password" placeholder="Password" required="required"/>
            <button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
        </form>
    </div>
@endsection
