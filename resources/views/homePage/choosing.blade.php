@extends('layout')


@section('content')
{{-- Choosing page --}}
    <div class="choosingSection">
        {{-- Restaurant  --}}
        <section class="chooPt1">
            <h2 class=" reveal animationDown">Popular Restaurant</h2>
            <section class="chooBuis reveal animationDown"> 
                @foreach ($businesses as $business)
                    <x-business-card :business="$business"/>
                @endforeach
            </section>
            {{-- <div >
                {{$businesses->links()}}
            </div> --}}
        </section>
        {{-- search abr --}}
        @include('partials._searchChoosing')
        {{-- Product --}}
        <section  class="chooPt1">
            <h2 class=" reveal animationUp">Best Deals Nearby</h2>
            <section class="chooPro  reveal animationUp">
                @foreach ($saleslots as $saleslot)
                    <x-product-card :saleslot="$saleslot"/>
                @endforeach
            </section>
            {{-- <div>
                {{$products->links()}}
            </div> --}}
        </section>      
    </div>
    
@endsection