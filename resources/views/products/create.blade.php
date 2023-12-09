@extends('layout')


@section('content')
    <section class="loginSection">
        <form class="form" action="/business/{{ $business_id }}/products" method="post" enctype="multipart/form-data">

            @csrf
            <h2>
                Create a new Product
            </h2>
            <div class="formFlex">
                <input type="text" value="{{ old('name') ? old('name') : '' }}" placeholder="Product Name" name="name" />
                @error('name')
                    <p>{{ $message }}</p>
                @enderror
                {{-- ! wrong values we have to change this! --}}
                <select name="category">
                    <option value="">Product Category</option>
                    <option value="Vegan">Vegan</option>
                    <option value="Vegetarian">Vegetarian</option>
                    <option value="Non-Vegetarian">Non-Vegetarian</option>
                </select>
                @error('category')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <div class="formFlex">
                <input type="text" value="{{ old('ingredientString') ? old('ingredientString') : '' }}"
                    placeholder="Ingredients" name="ingredientString" />
                @error('ingredientString')
                    <p>{{ $message }}</p>
                @enderror
                <input type="text" value="{{ old('allergyString') ? old('allergyString') : '' }}"
                    placeholder="Allergies" name="allergyString" />
                @error('allergyString')
                    <p>{{ $message }}</p>
                @enderror
            </div>
            <input type="file" placeholder=" Product Image" name="picture" />
            @error('picture')
                <p>{{ $message }}</p>
            @enderror

            <button class="loginBtn">
                Add Product
            </button>
        </form>
        <div id="register">
            <p>
                <a href="/login" class="text-laravel">Back</a>
            </p>
        </div>
    </section>
@endsection
