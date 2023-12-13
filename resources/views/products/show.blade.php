{{-- This file is the view for a single product --}}

@extends('layout')

@section('content')
    <section class="showProd">
        <h1 class=" reveal animationShow">
            You are viewing details for the product {{ $product->name }} {{-- with id: {{ $product->id }} --}}
        </h1>
        <article class="showProdArt reveal animationShow">
            <div>
                <img src="{{ asset("storage/$product->picture") }}" alt="image for {{ $product->name }}">
                @if (auth()->check() && $product->business && $product->business->manager && auth()->user())
                    @if ($product->business->manager->id == auth()->user()->id || auth()->user()->role == 'admin')
                        {{-- <a href="/business/{{ $product->business->id }}/products/create">Add a new product</a> --}}

                        {{-- <a href="/business/{{ $product->business->id }}/products/{{ $product->id }}/edit">Edit</a> --}}

                        {{-- <form action="/business/{{ $product->business->id }}/products/{{ $product->id }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> --}}
                    @endif
                @endif
            </div>
            <div class="showProdDetails">
                <h2>Name of the product: {{ $product->name }}</h2>
                <h3>Category of the product: {{ $product->category }}</h3>
                <h4>Ingredients: {{ $product->ingredientString }}</h4>
                <h4>Allergies: {{ $product->allergyString }}</h4>
            </div>
        </article> 

    </section>
    <a id="backButt" href="/business/{{ $product->business->id }}/products"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
@endsection
