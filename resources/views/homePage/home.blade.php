@extends('layout')

{{-- home page content --}}
@section('content')
    {{-- Title part --}}
    <section id="homeSection">
        <h1 class="reveal animationDown">Last Call</h1>
        <p id="homePageP" class="reveal animationShow">Join us in being a hero against food waste.</p>
        <div id="mapLink">
            <a href="/map">
                <div id="insMapLink">
                    <img src="/storage/homeImages/locationIcon.png" alt="">
                    <p>
                        View Map
                    </p>
                </div>
            </a>
        </div>
        @include('partials._searchHomePage')
        
    </section>
    {{-- bottom of main page --}}
    <section id="homeArticle">
        <article>
            <div>
                <a class="reveal animationLeft" href="/choosing">Buy</a>
                <a class="reveal animationRight" href="/choosing/sell" id="buttonSell">Sell</a>
            </div>
            <p class="reveal animationUp">
                LastCall is a revolutionary website that enables users to enjoy a delicious dining experience while
                promoting sustainability and reducing food waste.
                This platform focuses on allowing users to pick up food orders from their favorite restaurants one hour
                before they close while offering an enticing a discount for these last-minute orders.
            </p>
        </article>
    </section>
    @include('partials._chatbot')
@endsection
