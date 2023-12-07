@extends('layout2')


@section('content')
    <section class="loginSection">
        <form class="form" action="/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <h2>
                Edit your User information
            </h2>
            <p>Edit: id:{{ $user->id }} {{ $user->firstname }} {{ $user->lastname }}</p>
            @method('PUT')
            @if ($user->profileImg)
                <img src="/storage/{{ $user->profileImg }}" alt="">
            @else
                <img src="/storage/profileImages/default.png" alt="">
            @endif
            <input type="file" name='profileImg'>
            @error('profileImg')
                <p>{{ $message }}</p>
            @enderror
            {{-- Update Firstname --}}
            <input type="text" value="{{ $user->firstname }}" name="firstname" />
            @error('firstname')
                <p>{{ $message }}</p>
            @enderror
            {{-- Update Lastname --}}
            <input type="text" value="{{ $user->lastname }}" name="lastname" />
            @error('lastname')
                <p>{{ $message }}</p>
            @enderror
            {{-- update Email --}}
            <input type="text" value="{{ $user->email }}" name="email" />
            @error('email')
                <p>{{ $message }}</p>
            @enderror
            {{-- Update phone --}}
            <input type="text" value="{{ $user->phonenumber }}"name="phonenumber" />
            @error('phonenumber')
                <p>{{ $message }}</p>
            @enderror
            {{-- ! have to check --}}
            {{-- Role Selection --}}
            @if (auth()->user()->role == 'admin')
                {{-- Select the current role of the user --}}
                <select name="role" id="role" value="{{ $user->role }}  ">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="restaurantManager" {{ $user->role == 'restaurantManager' ? 'selected' : '' }}>Restaurant
                        Manager</option>
                </select>

                @error('role')
                    <p>{{ $message }}</p>
                @enderror
            @endif
            {{-- Update Password
                Make a reset password procedure    
            --}}
            <button class="loginBtn">
                Update User
            </button>
        </form>
        <div id="register">
            <p>
                <a href="/users" class="text-laravel"> Back </a>
            </p>
        </div>
    </section>
@endsection
