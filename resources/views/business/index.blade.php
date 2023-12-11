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
    <section class="adminSection">

        <h1>All Businesses</h1>

        <div class="allCardsContainer">
            <div class="restCard">
                <ul class="lg:grid lg:grid-cols-2">
                    @foreach ($business as $bus)
                        <li class="adminContent">
                            <a href="/business/{{ $bus->id }}">
                                <div>
                                    @if ($bus->businessImg)
                                        <img src="/storage/{{ $bus->businessImg }}" alt="{{ $bus->name }} image">
                                    @else
                                        <img src="/storage/businessImages/restaurantGeneral.png"
                                            alt="{{ $bus->name }} image">
                                    @endif
                                    <h2>Name: {{ $bus->name }}</h2>
                                    <h3>Address: {{ $bus->address }}</h3>
                                    <p>The Category is: {{ $bus->category->name }}</p>
                                </div>

                                {{-- Action buttons --}}
                                <div class="iconsDashboard">
                                    {{-- Edit button container --}}
                                    <div>
                                        <a href=""><i class="fa-solid fa-pen-to-square icon"></i>
                                            <br><span class="iconLabel">Edit</span></a>
                                    </div>

                                    {{-- View button container --}}
                                    <div>
                                        <a href=""><i class="fa-solid fa-eye icon"></i> <br><span
                                                class="iconLabel">View</span></a>
                                    </div>

                                    {{-- Delete button container --}}
                                    <div>
                                        <a href=""><i class="fa-solid fa-trash icon"></i> <br><span
                                                class="iconLabel">Delete</span></a>
                                    </div>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>

                <ul class="allManagersRest">
                    @foreach ($business as $bus)
                        <li class="cardManagersRest">
                            <a href="/business/{{ $bus->id }}">
                                <p>The manager is: {{ $bus->manager->firstname }}
                                    {{ $bus->manager->lastname }}</p>
                                <h2>Name: {{ $bus->name }}</h2>

                                {{-- Managing Icons --}}
                                <div class="iconsDashboard">
                                    {{-- Edit button container --}}
                                    <div>
                                        <a href=""><i class="fa-solid fa-pen-to-square icon"></i>
                                            <br><span class="iconLabel">Edit</span></a>
                                    </div>

                                    {{-- View button container --}}
                                    <div>
                                        <a href=""><i class="fa-solid fa-eye icon"></i> <br><span
                                                class="iconLabel">View</span></a>
                                    </div>

                                    {{-- Delete button container --}}
                                    <div>
                                        <a href=""><i class="fa-solid fa-trash icon"></i> <br><span
                                                class="iconLabel">Delete</span></a>
                                    </div>
                                </div>
                        </li>
                        <br>
                    @endforeach
                </ul>

                <div class="btnsDashboard">
                    <button class="buyBtn">Buy</button>
                    <button class="logoutBtn">Logout</button>
                </div>

            </div>
        </div>
    </section>
@endsection
