@extends('layout2')

@section('content')
    <div class="max-w-6xl mx-auto py-6">
        <h1 class="text-3xl font-semibold text-gray-800 mb-6">Lista de lotes de venta</h1>
   
        <ul class="space-y-4">
            @foreach ($saleslots as $salesLot)
                <li class="bg-white shadow-lg rounded-lg overflow-hidden">
                    <div class="px-6 py-4">
                        <h1 class="font-bold text-xl text-gray-700">product {{$product->name}} with Id: {{$product->id}}</h1>
                        <h2 class="text-lg text-gray-600">Description{{$salesLot->description}}</h2>
                        <h2 class="text-lg text-gray-600">Price: {{$salesLot->price}}</h2>
                        <h3 class="text-md text-gray-600">Initial Quantity: {{$salesLot->initial_quantity}}</h3>
                        <h4 class="text-md text-gray-600">Current Quantity: {{$salesLot->current_quantity}}</h4>
                        <h5 class="text-md text-gray-600">Discount: {{$salesLot->discount}}%</h5>
                        <h6 class="text-sm text-gray-600">Start Date: {{$salesLot->start_date}}</h6>
                        <h6 class="text-sm text-gray-600">End Date: {{$salesLot->end_date}}</h6>
                        <div class="flex space-x-4 mt-4">
                            <a href="/products/{{$product_id}}/saleslot/{{$salesLot->id}}/edit" class="text-blue-500 hover:text-blue-700 font-medium">Edit</a>
                            <form action="/products/{{$product_id}}/saleslot/{{$salesLot->id}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700 font-medium">Delete</button>
                            </form>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
