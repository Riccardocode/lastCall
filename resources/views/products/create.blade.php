@extends('layout2')


@section('content')

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a new Product
            </h2>
        </header>

    <form action="/business/{{$business_id}}/products" method="post" enctype="multipart/form-data" >
      
        @csrf
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">Product Name</label>
            <input type="text" value="{{ old('name') ? old('name') : '' }}" class="border border-gray-200 rounded p-2 w-full" name="name" />
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="category" class="inline-block text-lg mb-2">Product Category</label>
            <select name="category" >
                <option value="Vegan">Vegan</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Non-Vegetarian">Non-Vegetarian</option>
            </select>
            @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="ingredientString" class="inline-block text-lg mb-2">Ingredients</label>
            <input type="text" value="{{ old('ingredientString') ? old('ingredientString') : '' }}" class="border border-gray-200 rounded p-2 w-full" name="ingredientString" />
            @error('ingredientString')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="allergyString" class="inline-block text-lg mb-2">Allergies</label>
            <input type="text" value="{{ old('allergyString') ? old('allergyString') : '' }}" class="border border-gray-200 rounded p-2 w-full" name="allergyString" />
            @error('allergyString')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="picture" class="inline-block text-lg mb-2">
                Product Image
            </label>
            <input type="file" class="border border-gray-200 rounded p-2 w-full" name="picture" />
            @error('picture')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
       

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Create new Sales Lot
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>

@endsection