@extends('layout')

@section('content')
    <section class="sectionOrder">
        <h1 class="reveal animationDown">Business Manager Orders</h1>

        {{-- Hello User name --}}
        {{-- Orders to be prepared for pickup --}}
        <h2 class="reveal animationShow">Orders to be picked up</h2>
        <article class="reveal animationShow">
            @if (count($ordered) > 0)
                @foreach ($ordered as $order)
                    <div>
                        {{-- <p><strong>Order ID:</strong> {{ $order->id }}</p> --}}
                        <ul>
                            @foreach ($order->order_items as $item)
                                <li>
                                    {{ $item->saleslot->product->name }}
                                    Qtyc: {{ $item->quantity }}
                                    Pricec: {{ $item->discounted_price }} €
                                </li>
                            @endforeach
                        </ul>
                        <p>Total Amount {{ $order->totalAmount }}</p>
                        <form  class="form" action="/businessmanagerorders" method='POST'>
                            @csrf
                            <input type="text" name="pickupToken" placeholder="Pickup Token">
                            <input type="hidden" name="order_id" value="{{ $order->id }}">
                            <div class="btnContainer">
                                <button type="submit" class="loginBtn">Deliver</button>
                            </div>
                        </form>
                    </div>
                @endforeach
            @else
                <p class="text-gray-600">No ordered orders found.</p>
            @endif
        </article>
        {{-- Picked up --}}
        <h2 class="reveal animationShow">Order History</h2>
        <article class="reveal animationShow">
            <h3>Orders picked up</h3>
            @if (count($delivered) > 0)
                @foreach ($delivered as $order)
                    <div>
                        {{-- <p><strong>Order ID:</strong> {{ $order->id }}</p> --}}
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
                <p >No orders found.</p>
            @endif

            </div>
        </article>

        {{-- Cancelled orders --}}
        <article class="reveal animationShow">
            <h3>Orders Cancelled</h3>
                @if (count($cancelled) > 0)
                    @foreach ($cancelled as $order)
                        <div>
                            {{-- <p><strong>Order ID:</strong> {{ $order->id }}</p> --}}
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
                    <p>No orders found.</p>
                @endif
        </article>
    </section>
@endsection
