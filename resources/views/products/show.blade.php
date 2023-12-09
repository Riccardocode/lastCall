{{-- This file is the view for a single product --}}

@extends('layout2')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-4">
            You are viewing details for the product {{ $product->name }} with id: {{ $product->id }}
        </h1>



        <div class="bg-white shadow-lg rounded-lg p-4 mb-6">
            <h2 class="text-xl font-bold text-gray-700 mb-2">Name of the product: {{ $product->name }}</h2>
            <h3 class="text-lg text-gray-600 mb-2">Category of the product: {{ $product->category }}</h3>
            <h4 class="text-md text-gray-500 mb-2">Ingredients: {{ $product->ingredientString }}</h4>
            <h4 class="text-md text-gray-500 mb-2">Allergies: {{ $product->allergyString }}</h4>
            <img class="w-50" src="{{ asset("storage/$product->picture") }}" alt="image for {{ $product->name }}"
                class="w-full h-auto rounded-md">
        </div>

        <div class='flex gap-10'>
            @if (auth()->check() && $product->business && $product->business->manager && auth()->user())
                @if ($product->business->manager->id == auth()->user()->id || auth()->user()->role == 'admin')
                    <a href="/business/{{ $product->business->id }}/products/create"
                        class="text-blue-500 hover:text-blue-700 font-medium">Add a new product</a>

                    <a href="/business/{{ $product->business->id }}/products/{{ $product->id }}/edit"
                        class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>

                    <form action="/business/{{ $product->business->id }}/products/{{ $product->id }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                    </form>
                @endif
            @endif

            <a href="/business/{{ $product->business->id }}/products">Back</a>



        </div>
    @endsection
