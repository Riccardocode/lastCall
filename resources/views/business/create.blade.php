@extends('layout2')


@section('content')
    <header class="text-center">
        <h2 class="text-2xl font-bold uppercase mb-1">
            Register a new Business
        </h2>
    </header>

    <form action="/business" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">Business Name</label>
            <input type="text" value="{{ old('name') ? old('name') : '' }}"
                class="border border-gray-200 rounded p-2 w-full" name="name" />
            @error('address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="address" class="inline-block text-lg mb-2">Business Address</label>
            <input type="text" value="{{ old('address') ? old('address') : '' }}"
                class="border border-gray-200 rounded p-2 w-full" name="address" />
            @error('address')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="category_id" class="inline-block text-lg mb-2">Business Category</label>
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('businessCategory')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Create new Business
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>
@endsection
