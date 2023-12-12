@extends('layout')
@section('content')
    <section class="adminSection">

        <h1 class="reveal animationShow">All Businesses</h1>

        <div class="allCardsContainer">
            <ul class="lg:grid lg:grid-cols-2">
                @foreach ($business as $bus)
                    <li class="adminContent reveal animationScale">
                        <section class="busiImg">
                            <a href="/business/{{ $bus->id }}">
                                @if ($bus->businessImg)
                                    <img src="/storage/{{ $bus->businessImg }}" alt="{{ $bus->name }} image">
                                @else
                                    <img src="/storage/businessImages/restaurantGeneral.png" alt="{{ $bus->name }} image">
                                @endif
                            </a>
                        </section>
                        <section class="buisName">
                            <h2>Name: {{ $bus->name }}</h2>
                            <h3>Address: {{ $bus->address }}</h3>
                            <p>The Category is: {{ $bus->category->name }}</p>
                        </section>
                        {{-- Action buttons --}}
                        <section class="iconsDashboard">
                            {{-- Edit button container --}}
                            <div>
                                <a href="/business/{{$bus->id}}/edit"><i class="fa-solid fa-pen-to-square icon"></i></a>
                            </div>

                            {{-- View button container --}}
                            <div>
                                <a href="/business/{{$bus->id}}"><i class="fa-solid fa-eye icon"></i></a>
                            </div>

                            {{-- Delete button container --}}
                            <div>
                                <form action="/business/{{ $bus->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium"><i class="fa-solid fa-trash icon"></i></button>
                                </form>
                            </div>
                        </section>

                    </li>
                @endforeach
            </ul>
            <div class="mt-6 p-4 reveal animationLeft">
                {{ $business->links() }}
            </div>

            <ul class="lg:grid lg:grid-cols-2">
                @foreach ($business as $bus)
                    <li id="busiMana" class="adminContent reveal animationScale" >
                        <section class="buisName">
                            <a href="/business/{{ $bus->id }}">
                                <p>The manager is: {{ $bus->manager->firstname }}
                                    {{ $bus->manager->lastname }}</p>
                                <h2>Name: {{ $bus->name }}</h2>
                            </a>
                        </section>
                        {{-- Managing Icons --}}
                        <section class="iconsDashboard">
                            {{-- Edit button container --}}
                            <div>
                                <a href="/users/{{$bus->manager->id}}/edit"><i class="fa-solid fa-pen-to-square icon"></i></a>
                            </div>

                            {{-- View button container --}}
                            <div>
                                <a href="/users/{{$bus->manager->id}}"><i class="fa-solid fa-eye icon"></i></a>
                            </div>

                            {{-- Delete button container --}}
                            <div>
                                <form action="/users/{{ $bus->manager->id }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-700 font-medium"><i class="fa-solid fa-trash icon"></i></button>
                                </form>
                            </div>
                        </section>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
@endsection
