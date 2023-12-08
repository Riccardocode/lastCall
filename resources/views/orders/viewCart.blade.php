{{-- this file to view the cart --}}
@extends('layout')

@section('content')
    <div class="container mx-auto py-6 mt-20">
        
        @foreach($carts as $cart)
        <h1 class="text-3xl font-semibold">Cart id: {{ $cart->id }}</h1>
        @foreach ($cart->order_items as $order_item)
            <div class="my-4 p-4 bg-white rounded-lg shadow-md">
                @if ($order_item->saleslot->product->picture)
                    <img style="width:250px" src="/storage/{{ $order_item->saleslot->product->picture }}" alt="">
                @else
                    <img style="width:250px" src="/storage/productPictures/Z2uAYTQh4nUqT4HTSjbClgMvDu0F9Sw2kRlN3NcR.png" alt="">
                @endif
                <h2 class="text-2xl font-semibold">Order item id: {{ $order_item->id }}</h2>
                <div class="flex justify-between items-center mt-2">
                    <div class="flex items-center space-x-4">
                        <h3 class="text-lg">Product name: {{ $order_item->saleslot->product->name }}</h3>
                        <h3 class="text-lg">Quantity: {{ $order_item->quantity }}</h3>
                    </div>
                    <div>
                        <h3 class="text-lg">Price: ${{ number_format($order_item->discounted_price, 2) }}</h3>
                        <h3 class="text-lg">Total Order Item Price:
                            ${{ number_format($order_item->quantity * $order_item->discounted_price, 2) }}</h3>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mt-6 flex justify-between items-center">
            <h3 class="text-xl font-semibold">Total Cost: ${{ number_format($cart['totalAmount'], 2) }}</h3>
            <a href="" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Checkout</a>
        </div>

        <hr class="mt-20">
        @endforeach

    </div>
@endsection
