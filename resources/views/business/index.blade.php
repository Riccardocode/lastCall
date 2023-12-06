@extends('layout2')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">All Businesses</h1>

        <ul class="space-y-4">
            @foreach ($business as $bus)
                <a href="/business/{{ $bus->id }}">
                    <li class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-50">
                        @if ($bus->businessImg)
                            <img src="/storage/{{ $bus->businessImg }}" alt="{{ $bus->name }} image" class="w-24 mb-2">
                        @else
                            <img src="/storage/businessImages/restaurantGeneral.png" alt="{{ $bus->name }} image"
                                class="w-24 mb-2">
                        @endif
                        <h2 class="text-2xl font-semibold text-gray-700 mb-2">Name: {{ $bus->name }}</h2>
                        <h3 class="text-lg text-gray-600 mb-4">Address: {{ $bus->address }}</h3>

                        <p class="text-md text-gray-500">The manager is: {{ $bus->manager->firstname }}
                            {{ $bus->manager->lastname }}</p>
                        <p class="text-md text-gray-500">The Category is: {{ $bus->category->name }}</p>
                    </li>
                </a>
            @endforeach
        </ul>
    </div>
@endsection
