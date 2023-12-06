@extends('layout2')

@section('content')

<h2>Do you want to be a restaurant Manager?</h2>
<form action="/users/{{$user_id}}/becomeManager" method="POST">
    @csrf
    @method('PUT')
    <button type="submit">Change Role to Restaurant Manager</button>
</form>


@endsection
