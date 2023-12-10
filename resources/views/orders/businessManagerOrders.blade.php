@extends('layout')

@section('content')
    <div class="container mx-auto p-4 mt-20">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Business Manager Orders</h1>

        {{-- Hello User name --}}
        {{-- Orders to be prepared for pickup --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-blue-600 mb-4">Orders to be picked up</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if ($ordered)
                    @foreach ($ordered as $order)
                        <div class="bg-white p-4 shadow rounded-lg">
                            <p><strong>Order ID:</strong> {{ $order->id }}</p>
                            <ul>
                                @foreach ($order->order_items as $item)
                                    <li>
                                        {{ $item->saleslot->product->name }}
                                        Qty: {{ $item->quantity }}
                                        Price: {{ $item->discounted_price }}
                                    </li>
                                @endforeach
                            </ul>
                            <p>Total Amount {{ $order->totalAmount }}</p>
                            <form action="" method='POST' class="flex items-center gap-2 mt-2">
                                <div class="flex-grow">
                                    <input type="text" name="pickupCode" placeholder="Pickup Code"
                                        class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                </div>

                                <button type="submit"
                                    class="py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Deliver</button>
                            </form>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-600">No ordered orders found.</p>
                @endif

            </div>
        </section>
        <h2>Order History</h2>

        {{-- Picked up --}}
        {{-- <section class="mb-8">
                <h2 class="text-xl font-semibold text-green-600 mb-4">Delivered Orders</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($delivered as $order)
                        <div class="bg-white p-4 shadow rounded-lg">
                            <p><strong>Order ID:</strong> {{ $order->id }}</p>
                            {{-- Add more order details here --}}
        {{-- </div>
    @empty
        <p class="text-gray-600">No delivered orders found.</p>
        @endforelse
        </div>
        </section> --}}

        {{-- Cancelled  --}}
        {{-- <section class="mb-8">
                <h2 class="text-xl font-semibold text-red-600 mb-4">Cancelled Orders</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @forelse($cancelled as $order)
                        <div class="bg-white p-4 shadow rounded-lg">
                            <p><strong>Order ID:</strong> {{ $order->id }}</p>
                            {{-- Add more order details here --}}
        {{-- </div>
        @empty
            <p class="text-gray-600">No cancelled orders found.</p>
            @endforelse
            </div>
            </section> --}}
        {{-- </div>
        @endsection --}}