@extends('auth.layouts.auth')

@section('authdata')
    <div class="login">
        <h1>Account Details</h1>
        <form method="post" action="{{ route('login') }}">
            @csrf

            <input id="name" name="name" type="text" placeholder="name" required="required" value="{{ $user->name }}"/>
            <input id="email" name="email" type="email" placeholder="email" required="required" value="{{ $user->email }}"/>
            <input id="password" name="password" type="password" placeholder="Password" required="required" value=""/>
            <button type="submit" class="btn btn-primary btn-block btn-large">Pas gegevens aan</button>
        </form>
    </div>
@endsection
