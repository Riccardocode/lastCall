@extends('layout') 
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
</head>
<body>
    
</body>
</html>
<section class="loginSection">
    <header>
    
</header>
<form class="form" action="/login" method="POST">
    @csrf
    @error('loginError')
        <p>{{ $message }}</p>
    @enderror
  <h2>
        Login
    </h2>
      <p>Log into your account to post jobs</p>
        {{-- <label for="email">Email</label> --}}
        <input type="email" name="email"
            value="{{ old('email') }}" placeholder="Your Email"/>
        @error('email')
            <p >{{ $message }}</p>
        @enderror
  
        {{-- <label for="password">
            Password
        </label> --}}
        <input type="password" name="password"
            value="{{ old('password') }}" placeholder="Password"/>
        @error('password')
            <p>{{ $message }}</p>
        @enderror

        <button class="loginBtn">
            Sign In
        </button>
 
</form>

 <div id="register">
        <p>
            Don't have an account?
            <a href="/register" class="text-laravel">Register</a>
        </p>
    </div>

    </section>

@endsection
