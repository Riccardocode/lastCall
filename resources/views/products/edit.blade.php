@extends('layout')


@section('content')
    <section class="loginSection">
        <form class="form" action="/business/{{ $business_id }}/products/{{ $product_id }}" method="post"
            enctype="multipart/form-data">
            @csrf
            <h2>
                Edit a new Product
            </h2>

            <img src="{{ $product->picture }}" alt="">
            @method('PUT')
            <div class="formFlex">
                <input type="text" value="{{ $product->name }}" name="name" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                <select name="category">
                    <option value="Vegan" <?php echo $product->category == 'Vegan' ? 'selected' : ''; ?>>Vegan</option>
                    <option value="Vegetarian" <?php echo $product->category == 'Vegetarian' ? 'selected' : ''; ?>>Vegetarian</option>
                    <option value="Non-Vegetarian" <?php echo $product->category == 'Non-Vegetarian' ? 'selected' : ''; ?>>Non-Vegetarian</option>
                </select>
                @error('category')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="formFlex">
                <input type="text" value="{{ $product->ingredientString }}" name="ingredientString" />
                @error('ingredientString')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
                <input type="text" value="{{ $product->allergyString }}" name="allergyString" />
                @error('allergyString')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="file" name="picture" />
            @error('picture')
                <p>{{ $message }}</p>
            @enderror
            <button class="loginBtn">
                Update product
            </button>
        </form>
        <div id="register">
            <p>
                <a href="/" class="text-laravel"> Back </a>
            </p>
        </div>
    </section>
@endsection
