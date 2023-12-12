@extends('layout')

@section('content')
    <section class="loginSection">
        <form class="form reveal animationScale" action="/users/{{ $user_id }}/becomeManager" method="POST">
            @csrf

            <h2 class="loginSell">Do you want to be a restaurant Manager?</h2>
            @method('PUT')
            <div class="loginSell btnContainer">
                <button class="loginBtn" type="submit">Change Role to Restaurant Manager</button>
            </div>
        </form>
    </section>
@endsection
