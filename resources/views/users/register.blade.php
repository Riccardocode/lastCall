@extends('layout')

@section('content')
    <section class="loginSection">
        <form class="form reveal animationScale" action='/users' method="post" enctype="multipart/form-data" class="form">
            @csrf

            <h2>
                Register
            </h2>
            <p>Create an account</p>
            {{-- <label for="profileImg">
                Profile Image
            </label> --}}
            <input type="file" name="profileImg" />
            @error('profileImg')
                <p>{{ $message }}</p>
            @enderror
            {{-- <label for="firstname">
                First Name
            </label>
            --}}
            <input type="text" name="firstname" value="{{ old('firstname') }}" placeholder="First Name" />
            @error('firstname')
                <p>{{ $message }}</p>
            @enderror
            {{-- <label for="lastname">
                Last Name
            </label> --}}
            <input type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name" />
            @error('lastname')
                <p>{{ $message }}</p>
            @enderror

            {{-- <label for="email">Email</label> --}}
            <input type="email" name="email" value="{{ old('email') }}" placeholder="Your Email" />
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            {{-- <label for="password">
                Password
            </label> --}}
            <input type="password" name="password" value="{{ old('password') }}" placeholder="Your Password" />
            @error('password')
                <p>{{ $message }}</p>
            @enderror
            {{-- <label for="password_confermation">
                Confirm Password
            </label> --}}
            <input type="password" name="password_confirmation" placeholder="Confirm Your Password" />
            @error('password_confirmation')
                <p>{{ $message }}</p>
            @enderror

            {{-- <label for="phonenumber">
                Phone Number
            </label> --}}
            <input type="text" name="phonenumber" value="{{ old('phonenumber') }}" placeholder="+352 254 256 198" />
            @error('phonenumber')
                <p>{{ $message }}</p>
            @enderror
            <div class="btnContainer">
                <button class="loginBtn">
                    Sign Up
                </button>
            </div>
        </form>
        <div id="register">
            <p>
                Already have an account?
                <a href="/login" class="text-laravel">Login</a>
            </p>
        </div>
    </section>
@endsection
