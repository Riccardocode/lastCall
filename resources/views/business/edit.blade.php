@extends('layout2')


@section('content')
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Edit your Business
        </h2>
    </header>

    <form action="/business/{{$id}}" method="post" enctype="multipart/form-data">

        @csrf
        @method('PUT')
        <div class="mb-6">
            @if ($business->businessImg)
                <img class="w-24" src="/storage/{{ $business->businessImg }}" alt="">
            @else
                <img class="w-24" src="/storage/businessImages/restaurantGeneral.png" alt="">
            @endif
            <input type="file" name='businessImg'>
            @error('businessImg')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">Business Name</label>
            <input type="text" value="{{ $business->name }}" class="border border-gray-200 rounded p-2 w-full"
                name="name" />
            @error('address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="address" class="inline-block text-lg mb-2">Business Address</label>
            <input type="text" value="{{ $business->address }}" class="border border-gray-200 rounded p-2 w-full"
                name="address" />
            @error('address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="category_id" class="inline-block text-lg mb-2">Business Category</label>
            <select name="category_id" value="$business->category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $business->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('businessCategory')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Update Business
            </button>

            <a href="/business/{{$business->id}}" class="text-black ml-4"> Back </a>
        </div>
    </form>
@endsection
