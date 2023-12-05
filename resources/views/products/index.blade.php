{{-- This file is the view for all the products within a business --}}

@extends('layout')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">
            You are viewing all the products
        </h1>


        @foreach ($products as $product)
            <a href="/business/{{ $product->business->id }}/products/{{ $product->id }}">
                <div class="bg-white shadow-lg rounded-lg p-4 mb-6">
                    <h2 class="text-xl font-bold text-gray-700 mb-2">Name of the product: {{ $product->name }}</h2>
                    <h3 class="text-lg text-gray-600 mb-2">Category of the product: {{ $product->category }}</h3>
                    <h3 class="text-lg text-gray-600 mb-2">Business: {{ $product->business->name }}</h3>
                    <h4 class="text-md text-gray-500 mb-2">Ingredients: {{ $product->ingredientString }}</h4>
                    <h4 class="text-md text-gray-500 mb-2">Allergies: {{ $product->allergyString }}</h4>
                    <img src="{{ $product->picture }}" alt="image for {{ $product->name }}" class="w-full h-auto rounded-md">
                </div>
        @endforeach
    </div>
    </a>
@endsection

@extends('layout')

{{-- Chossing page --}}
@section('content')
    <h2>Popular Categories</h2>
    {{--! see gigs in the gigs/index.blade.php --}}
    {{-- ! back-end team, it's your time to shine !!! :D fixt this :p --}}
    {{-- @foreach ($business as $busines)
        <x-business-card :busines="$busines"/>
    @endforeach --}}

    @include('partials._searchChoosing')

    <h2>Best Deals Nearby</h2>
    {{--! see gigs in the gigs/index.blade.php --}}
    {{-- ! back-end team, it's your time to shine !!! :D fixt this :p --}}
    {{-- @foreach ($products as $product)
        <x-product-card :product="$product"/>
    @endforeach --}}
@endsection

