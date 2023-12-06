@extends('layout')


@section('content')

    <h2>Popular Restaurant</h2>

    @foreach ($businesses as $business)
        <x-business-card :business="$business"/>
    @endforeach
    <div class="mt-6 p-4">
        {{$businesses->links()}}
    </div>

    @include('partials._searchChoosing')

    <h2>Best Deals Nearby</h2>
    
    @foreach ($products as $product)
        <x-product-card :product="$product"/>
    @endforeach
    <div class="mt-6 p-4">
        {{$products->links()}}
    </div>
    
@endsection