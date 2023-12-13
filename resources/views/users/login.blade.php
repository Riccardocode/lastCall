@extends('layout')
@section('content')
    <section class="loginSection">
        <form class="form reveal animationScale" action="/login" method="POST">
            @csrf
            @error('loginError')
                <p>{{ $message }}</p>
            @enderror
            <h2>
                Login
            </h2>
            <p>Log into your account</p>
            {{-- <label for="email">Email</label> --}}
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" />
            @error('email')
                <p>{{ $message }}</p>
            @enderror

            {{-- <label for="password">
                Password
            </label> --}}
            <input type="password" name="password" value="{{ old('password') }}" placeholder="Password" />
            @error('password')
                <p>{{ $message }}</p>
            @enderror
        <div class="btnContainer">
            <button type="submit" class="loginBtn">
                Sign In
            </button>
        </div>
       
        </form>
        <div id="register" class="reveal animationUp">
            <p>
                Don't have an account?
                <a href="/register" class="text-laravel">Register</a>
            </p>
        </div>
    </section>
@endsection
