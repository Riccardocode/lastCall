@extends('layout')


@section('content')
{{-- Choosing page --}}
    <div class="choosingSection">
        {{-- Restaurant  --}}
        <section class="chooPt1">
            <h2>Popular Restaurant</h2>
        
            @foreach ($businesses as $business)
                <x-business-card :business="$business"/>
            @endforeach
            {{-- <div >
                {{$businesses->links()}}
            </div> --}}
        </section>
        {{-- search abr --}}
        <section class="chooSearch">
            @include('partials._searchChoosing')
        </section>
        {{-- Product --}}
        <section  class="chooPt1">
            <h2>Best Deals Nearby</h2>
            
            @foreach ($products as $product)
                <x-product-card :product="$product"/>
            @endforeach
            {{-- <div>
                {{$products->links()}}
            </div> --}}
        </section>      
    </div>
    
@endsection