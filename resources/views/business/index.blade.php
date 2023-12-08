@extends('layout')
@section('content')



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <script src="https://kit.fontawesome.com/9823a17fbf.js" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<section>


<button class="buyBtn">Buy</button>
<button class="logoutBtn">Logout</button>

 <h1>All Businesses</h1>

<div class="allCardsContainer">
    <div class="restCard">
        <ul>
            @foreach ($business as $bus)
                <a href="/business/{{ $bus->id }}">
                    <li>
                        @if ($bus->businessImg)
                            <img src="/storage/{{ $bus->businessImg }}" alt="{{ $bus->name }} image">
                        @else
                            <img src="/storage/businessImages/restaurantGeneral.png" alt="{{ $bus->name }} image"
                            >
                        @endif
                        <h2>Name: {{ $bus->name }}</h2>
                        <h3>Address: {{ $bus->address }}</h3>

                        <p>The manager is: {{ $bus->manager->firstname }}
                            {{ $bus->manager->lastname }}</p>
                        <p>The Category is: {{ $bus->category->name }}</p>
                    </li>
                </a>
            @endforeach
        </ul>
<div class="iconsDashboard">


</div>




    </div>
    </div>
    </section>
@endsection
