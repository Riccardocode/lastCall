@extends('layout2')

@section('content')
    <div class="container mx-auto px-4 py-6">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-6">All Businesses</h1>

        <ul class="space-y-4">

            <li class="bg-white rounded-lg shadow-lg p-6 hover:bg-gray-50">
                @if ($business->businessImg)
                    <img src="/storage/{{ $business->businessImg }}" alt="{{ $business->name }} image" class="w-24 mb-2">
                @else
                    <img src="/storage/businessImages/restaurantGeneral.png" alt="{{ $business->name }} image"
                        class="w-24 mb-2">
                @endif
                <h2 class="text-2xl font-semibold text-gray-700 mb-2">Name: {{ $business->name }}</h2>
                <h3 class="text-lg text-gray-600 mb-4">Address: {{ $business->address }}</h3>

                <p class="text-md text-gray-500">The manager is: {{ $business->manager->firstname }}
                    {{ $business->manager->lastname }}
                </p>
                <p class="text-md text-gray-500">The Category is: {{ $business->category->name }}</p>
            </li>

        </ul>
        <div class='flex gap-10'>
            <a href="/business/{{ $business_id }}/edit" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>

            <form action="/business/{{ $business_id }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
            </form>

            <a class="text-green-500 hover:text-green-700 font-medium" href="/business/{{ $business_id }}/products">Products</a>

            @if (auth()->user()->role == 'admin')
                <a href="/business">Back</a>
            @endif
        </div>

    </div>
@endsection
