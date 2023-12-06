{{-- This file is the view for all the products within a business --}}

@extends('layout')

@section('content')
    <div class="businessClientView">
        <section class="logoAdd">
            <div class="imgDiv">
                {{-- <img class="logoRest" src="/storage/businessImages/{{ asset('images/generalProfile.png') }}" alt=""> ! restaurant image --}}
                {{-- manage image in business --}}
                <img class="logoRest" src="/storage/businessImages/restaurantGeneral.png" alt=""> {{-- ! restaurant image --}}
                <h1 class="nameRest">{{ $business->name }}</h1>
            </div>
            <div>
                Some Stuff, we have to think about this
            </div>
        </section>

        <section class="businessProduts">
            @if (auth()->check() && (auth()->user()->id == $business->manager_id || auth()->user()->role == 'admin'))
                <a href="/business/{{ $business->id }}/products/create">Add product</a>
            @endif

            @if ($business->products->count() == 0)
                <h1>There are no products in this business</h1>
            @else
                <h1>Products</h1>

                @foreach ($products as $product)
                    <section class="productClientViewS">
                        <a href="/business/{{ $business->id }}/products/{{ $product->id }}">
                            <img src="/storage/{{ $product->picture }}" alt="image for {{ $product->name }}"
                                class="w-full h-auto rounded-md">
                        </a>
                        <h2>{{ $product->name }}</h2>
                        <div>
                            <h3>{{ $product->category }}</h3>
                            <h4>Ingredients: {{ $product->ingredientString }}</h4>
                            <h4>Allergies: {{ $product->allergyString }}</h4>
                        </div>
                        @if (auth()->check() && (auth()->user()->id == $business->manager_id || auth()->user()->role == 'admin'))
                            {{-- change this with pen icon for edit --}}
                            <a href="/business/{{ $business->id }}/products/{{ $product->id }}/edit">
                                <i class="fa-solid fa-pencil"></i>
                            </a>

                            <form action="/business/{{ $business->id }}/products/{{ $product->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                {{-- change this with delete Icon --}}
                                <button type="submit">
                                    {{-- Is style related to a generic form? --}}
                                    <i class="fa-solid fa-trash"></i>
                                </button>
                            </form>

                            {{-- Change this with Saleslot Icon --}}
                            <a href="/business/{{ $business->id }}/products/{{ $product->id }}/saleslot/create">
                                {{-- new sales lot --}}
                                <i class="fa-solid fa-tags"></i>
                            </a>
                        @else
                            <p>price <i class="fa-solid fa-dollar-sign"></i>
                            </p>{{-- Dear back-end friend fix this :) --}}
                            <button>Add <i class="fa-solid fa-cart-arrow-down"></i></button>
                        @endif
                    </section>
                @endforeach
            @endif
        </section>
    </div>
@endsection
