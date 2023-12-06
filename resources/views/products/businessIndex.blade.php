{{-- This file is the view for all the products within a business --}}

@extends('layout')

@section('content')
    <div class="businessClientView">
        <section class="logoAdd">
            <div class="imgDiv">
                <img class="logoRest" src="{{asset('images/generalProfile.png')}}" alt=""> {{-- ! restaurant image --}}
                <h1 class="nameRest">{{ $business->name }}</h1>
            </div>
            <div>
                Some Stuff, we have to think about this
            </div>
        </section>

        <section class="businessProduts">
            @foreach ($products as $product)
                <section class="productClientViewS">
                    <a href="/business/{{ $business->id }}/products/{{ $product->id }}">
                        <img src="{{ $product->picture }}" alt="image for {{ $product->name }}" class="w-full h-auto rounded-md">
                    </a>
                    <h2>{{ $product->name }}</h2>
                    <div>
                        <h3>{{ $product->category }}</h3>
                        <h4>Ingredients: {{ $product->ingredientString }}</h4>
                        <h4 >Allergies: {{ $product->allergyString }}</h4>
                    </div>
                    <p>price <i></i></p>{{-- Dear back-end friend fix this :) --}}
                    <button>Add <i class="fa-solid fa-cart-arrow-down"></i></button>
                </section>
            @endforeach
        </section>
    </div>
@endsection
