{{-- Here place the rooting  --}}

@extends('layout')

@section('content')

<section class="loginSection">
    <h2>We care about sustainability, do you?</h2><br>
    <h3> if you manage a restaurant and you would love to be a part of our community, please register</h3><br>

    <h2>Our Mission</h2><br>
    <p>Our mission is to help restaurants to be more sustainable and to help people to find sustainable restaurants</p>
    <br>
    <h2>How it works</h2><br>
    <p>Register a profile and become a restaurant manager</p>
    <p>Than create your restaurant and add your products to our website. People can search for restaurants and products and buy them</p>
    <div id="sellLogin">
        <a href="/register"><button >Register</button></a>
        <a href="/login"><button >Login</button></a>
    </div>
</section>
@endsection