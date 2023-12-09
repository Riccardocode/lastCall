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
                    <li>
                        <a href="/business/{{ $bus->id }}">
                        <div>
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
                        </div>

        {{-- Action buttons --}}
                        <div class="iconsDashboard">  
                        {{-- Edit button container --}}
                            <div>
                        <a href=""><i class="fa-solid fa-pen-to-square icon"></i>
                        <br><span 
                        class="iconLabel">Edit</span></a></div>

                        {{-- View button container --}}
                        <div>
                        <a href=""><i class="fa-solid fa-eye icon"></i> <br><span class="iconLabel">View</span></a> </div>

                        {{-- Delete button container --}}
                        <div>
                        <a href=""><i class="fa-solid fa-trash icon"></i> <br><span class="iconLabel">Delete</span></a></div>
                        </div>
                        </a>
                    </li>
              
            @endforeach
        </ul>





    </div>
    </div>
    </section>
@endsection
