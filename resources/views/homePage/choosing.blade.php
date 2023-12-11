@extends('layout')


@section('content')
{{-- Choosing page --}}
    <div class="choosingSection">
        {{-- Restaurant  --}}
        <section class="chooPt1">
            <h2>Popular Restaurant</h2>
            <section class="chooBuis"> 
                @foreach ($businesses as $business)
                    <x-business-card :business="$business"/>
                @endforeach
            </section>
            <div >
                {{-- {{$businesses->links()}} --}}
                <a href="/choosing/?page=1">1</a>
                <a href="/choosing/?page=2">2</a>
            </div>
        </section>
        {{-- search abr --}}
        @include('partials._searchChoosing')
        {{-- Product --}}
        <section  class="chooPt1">
            <h2>Best Deals Nearby</h2>
            
            <section class="chooPro">
                @foreach ($products as $product)
                    <x-product-card :product="$product"/>
                @endforeach
            </section>
            {{-- <div>
                {{$products->links()}}
            </div> --}}
        </section>      
    </div>
    
@endsection