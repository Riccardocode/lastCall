@extends('layout')

@section('content')
    <section class="showProd" id="userSection">
        <article class="showProdArt reveal animationScale" id="userSection">
            <div>
                <img src="{{ asset("storage/$user->profileImg") }}" alt="image for {{ $user->firstname }}">
            </div>
            <div class="showProdDetails">
                <h2>Name: {{ $user->firstname }} {{ $user->lastname }}</h2>
                <h3>Email: {{ $user->email }}</h3>
                <h4>Phone Number: {{ $user->phonenumber }}</h4>
                <h4>Role: {{ $user->role }}</h4>
                <div>
                    <a href="/users/{{$user->id}}/edit" id="iconBtn"><i class="fa-solid fa-pen-to-square icon"></i></a>
                </div>
                {{-- <a href="/users/{{$user->id}}/edit"><button>Edit</button></a> --}}
            </div>
        </article>
    </section>
@endsection
