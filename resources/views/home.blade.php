@extends('layout')

    {{-- home page content --}}
@section('content')
    {{-- Title part --}}
    <section id="homeSection">
        <h1>Last Call</h1>
        <p id="homePageP">Join us in being a hero against food waste.</p>
        @include('partials._searchHomePage')
    </section>
    {{-- bottom of main page --}}
    <article id="homeArticle">
        <div>
            <a href="/products">Buy</a>
            <a href="/business/create" id="buttonSell">Sell</a>
        </div>
        <p>
            LastCall is a revolutionary website that enables users to enjoy a delicious dining experience while promoting sustainability and reducing food waste.
            This platform focuses on allowing users to pick up food orders from their favorite restaurants one hour before they close while offering an enticing a discount for these last-minute orders.
         </p>
    </article>
    <a href="/products">test</a>
@endsection