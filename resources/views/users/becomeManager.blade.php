@extends('layout2')

@section('content')
    <section class="loginSection">
        <form class="form" action="/users/{{ $user_id }}/becomeManager" method="POST">
            @csrf

            <h2>Do you want to be a restaurant Manager?</h2>
            @method('PUT')
            <button class="loginBtn" type="submit">Change Role to Restaurant Manager</button>
        </form>
    </section>
@endsection
