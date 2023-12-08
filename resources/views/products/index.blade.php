{{-- This file is the view for all the products within a business --}}

@extends('layout')

@section('content')
    <div>
        <h1>
            You are viewing all the products
        </h1>

        @foreach ($products as $product)
            <a href="/business/{{ $product->business->id }}/products/{{ $product->id }}">
                <div>
                    <h2>Name of the product: {{ $product->name }}</h2>
                    <h3>Category of the product: {{ $product->category }}</h3>
                    <h3>Business: {{ $product->business->name }}</h3>
                    <h4>Ingredients: {{ $product->ingredientString }}</h4>
                    <h4>Allergies: {{ $product->allergyString }}</h4>
                    <img src="{{ $product->picture }}" alt="image for {{ $product->name }}">
                </div>
        @endforeach
    </div>
    </a>
@endsection



