@extends('layout2')


@section('content')

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit a new Product
            </h2>
        </header>

    <form action="/business/{{$business_id}}/products/{{$product_id}}" method="post" enctype="multipart/form-data" >
      
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2">Product Name</label>
            <input type="text" value="{{ $product->name }}" class="border border-gray-200 rounded p-2 w-full" name="name" />
            @error('name')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="category" class="inline-block text-lg mb-2">Product Category</label>
            
            <select name="category">
                <option value="Vegan" <?php echo ($product->category == 'Vegan') ? 'selected' : ''; ?>>Vegan</option>
                <option value="Vegetarian" <?php echo ($product->category == 'Vegetarian') ? 'selected' : ''; ?>>Vegetarian</option>
                <option value="Non-Vegetarian" <?php echo ($product->category == 'Non-Vegetarian') ? 'selected' : ''; ?>>Non-Vegetarian</option>
            </select>
            
            @error('category')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="ingredientString" class="inline-block text-lg mb-2">Ingredients</label>
            <input type="text" value="{{ $product->ingredientString }}" class="border border-gray-200 rounded p-2 w-full" name="ingredientString" />
            @error('ingredientString')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="allergyString" class="inline-block text-lg mb-2">Allergies</label>
            <input type="text" value="{{ $product->allergyString }}" class="border border-gray-200 rounded p-2 w-full" name="allergyString" />
            @error('allergyString')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <img src="{{$product->picture}}" alt="">
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
                Update product
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>

@endsection