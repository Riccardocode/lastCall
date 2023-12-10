@extends('layout')

@section('content')
    <div class="container mx-auto p-4 mt-20">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Business Manager Orders</h1>

        {{-- Hello User name --}}
        {{-- Orders to be prepared for pickup --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-blue-600 mb-4">Orders to be picked up</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if (count($ordered)>0)
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
                            <form action="/businessmanagerorders" method='POST' class="flex items-center gap-2 mt-2">
                                @csrf
                                <div class="flex-grow">
                                    <input type="text" name="pickupToken" placeholder="Pickup Token"
                                        class="block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    <input type="hidden" name="order_id" value="{{ $order->id }}">
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
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Order History</h2>

        {{-- Picked up --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-blue-600 mb-4">Orders picked up</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if (count($delivered)>0)
                    @foreach ($delivered as $order)
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
                            <p>Delivered at {{ $order->pickedupDateTime }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-600">No orders found.</p>
                @endif

            </div>
        </section>

        {{-- Cancelled orders --}}
        <section class="mb-8">
            <h2 class="text-xl font-semibold text-blue-600 mb-4">Orders Cancelled</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                @if (count($cancelled)>0)
                    @foreach ($cancelled as $order)
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
                            <p>Delivered at {{ $order->pickedupDateTime->format('M d, Y') }}</p>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-600">No orders found.</p>
                @endif

            </div>
        </section>
