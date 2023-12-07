@extends('layout2')


@section('content')
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit your User information
        </h2>
        <p class="mb-4">Edit: id:{{ $user->id }} {{ $user->firstname }} {{ $user->lastname }}</p>
    </header>

    <form action="/users/{{ $user->id }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        
        <div class="mb-6">
            @if ($user->profileImg)
                <img class="w-24" src="/storage/{{ $user->profileImg }}" alt="">
            @else
                <img class="w-24" src="/storage/profileImages/default.png" alt="">
            @endif
            <input type="file" name='profileImg'>
            @error('profileImg')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        {{-- Update Firstname --}}
        <div class="mb-6">
            <label for="firstname" class="inline-block text-lg mb-2">First Name</label>
            <input type="text" value="{{ $user->firstname }}" class="border border-gray-200 rounded p-2 w-full"
                name="firstname" />
            @error('firstname')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Update Lastname --}}
        <div class="mb-6">
            <label for="lastname" class="inline-block text-lg mb-2">Last Name</label>
            <input type="text" value="{{ $user->lastname }}" class="border border-gray-200 rounded p-2 w-full"
                name="lastname" />
            @error('lastname')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- update Email --}}
        <div class="mb-6">
            <label for="email" class="inline-block text-lg mb-2">Email</label>
            <input type="text" value="{{ $user->email }}" class="border border-gray-200 rounded p-2 w-full"
                name="email" />
            @error('email')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Update phone --}}
        <div class="mb-6">
            <label for="phonenumber" class="inline-block text-lg mb-2">Phone Number</label>
            <input type="text" value="{{ $user->phonenumber }}" class="border border-gray-200 rounded p-2 w-full"
                name="phonenumber" />
            @error('phonenumber')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- Role Selection --}}
        @if (auth()->user()->role == 'admin')
            <div class="mb-6">
                <label for="role" class="inline-block text-lg mb-2">Role</label>
                {{-- Select the current role of the user --}}
                <select name="role" id="role" value="{{ $user->role }}  ">
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="restaurantManager" {{ $user->role == 'restaurantManager' ? 'selected' : '' }}>Restaurant
                        Manager</option>
                </select>

                @error('role')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
        @endif

        {{-- Update Password
                Make a reset password procedure    
            --}}




        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Update User
            </button>

            <a href="/users" class="text-black ml-4"> Back </a>
        </div>
    </form>
@endsection
