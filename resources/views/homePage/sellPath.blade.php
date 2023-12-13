{{-- Here place the rooting  --}}

@extends('layout')

@section('content')

<section class="loginSection">
    <h2 class="reveal animationDown">We care about sustainability, do you?</h2><br>
    <h3 class="reveal animationShow"> if you manage a restaurant and you would love to be a part of our community, please register</h3><br>

    <h2 class="reveal animationShow">Our Mission</h2><br>
    <p class="reveal animationScale">Our mission is to help restaurants to be more sustainable and to help people to find sustainable restaurants</p>
    <br>
    <h2 class="reveal animationShow">How it works</h2><br>
    <p class="reveal animationScale">Register a profile and become a restaurant manager</p>
    <p class="reveal animationScale">Than create your restaurant and add your products to our website. People can search for restaurants and products and buy them</p>
    <div id="sellLogin" class="reveal animationUp">
        <a href="/register"><button >Register</button></a>
        <a href="/login"><button >Login</button></a>
    </div>
</section>
@endsection