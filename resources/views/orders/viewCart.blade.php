{{-- this file to view the cart --}}
@extends('layout')

@section('content')
    <section class="cartPage">
        {{-- if the cart is empty --}}
        @if ($carts->count() > 0)
            @foreach ($carts as $cart)
                <h1 class="reveal animationDown">
                    Business: {{ $cart->businessName }} {{-- Cart id: {{ $cart->id }} --}}</h1>
                @foreach ($cart->order_items as $order_item)
                    <section class="productCart">
                        <article class="reveal animationLeft">
                            <section>
                                @if ($order_item->saleslot->product->picture)
                                    <img style="width:250px" src="/storage/{{ $order_item->saleslot->product->picture }}"
                                        alt="">
                                @else
                                    <img style="width:250px"
                                        src="/storage/productPictures/Z2uAYTQh4nUqT4HTSjbClgMvDu0F9Sw2kRlN3NcR.png"
                                        alt="">
                                @endif
                            </section>
                            <section>
                                {{-- Timer --}}
                                <h4>Remaining time</h4>
                                <h4 id="countdown-timer-{{ $order_item->id }}"></h4>

                                <script>
                                    @foreach ($cart->order_items as $order_item)
                                        setupCountdownTimer("{{ $order_item->id }}", "{{ $order_item->created_at->addMinutes(80) }}");
                                    @endforeach


                                    function setupCountdownTimer(orderItemId, endDateString) {
                                        let endDate = moment(endDateString);
                                        console.log('endDateString: ' + endDateString);
                                        // Update the countdown timer every second
                                        setInterval(function() {
                                            let now = moment();
                                            let duration = moment.duration(endDate.diff(now));

                                            // Format and display the remaining time
                                            let remainingTime = duration.hours() + "h " + duration.minutes() + "m " + duration.seconds() + "s";
                                            let timerElement = document.getElementById("countdown-timer-" + orderItemId);
                                            timerElement.textContent = remainingTime;

                                            // Hide the timer when the sales slot ends
                                            if (duration.asSeconds() <= 0) {
                                                timerElement.textContent = "Sales slot ended!";
                                            }
                                        }, 1000); // Update every 1 second
                                    }
                                </script>
                            </section>

                            {{-- <h2>Order item id: {{ $order_item->id }}</h2> --}}
                            <h3> {{ $order_item->saleslot->product->name }}</h3>
                            <div class="manageQuantity">
                                <button><i class="fa-solid fa-minus"></i></button>
                                <input type="" value=" {{ $order_item->quantity }}">
                                <button><i class="fa-solid fa-plus"></i></button>
                            </div>
                            <div class="priceCart">
                                <h3>{{ number_format($order_item->discounted_price, 2) }} €</h3>
                            </div>
                            <h3 id="totalOf1Prod">Total
                                {{ number_format($order_item->quantity * $order_item->discounted_price, 2) }} €</h3>
                        </article>
                        {{-- remove item from cart --}}
                        <form class="reveal animationLeft" action="/orders/{{ $cart->id }}/{{ $order_item->id }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-600">Remove item</button>
                        </form>
                    </section>
                @endforeach
                <div class="totalAllProd">
                    <h3 class="reveal animationRight">Total Cost: {{ number_format($cart['totalAmount'], 2) }} €</h3>
                    {{-- <a href="" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Checkout</a> --}}
                    <form class="reveal animationRight" action="/orders/cart/payment" method="POST">
                        @csrf
                        {{-- Pass cart ID or any other required information as hidden inputs --}}
                        <input type="hidden" name="order_id" value="{{ $cart->id }}">
                        <input type="hidden" name="totalAmount" value="{{ number_format($cart['totalAmount'], 2) }}">
                        {{-- Add any other necessary data as hidden inputs here --}}
                        <button type="submit">Checkout</button>
                    </form>
                </div>

            @endforeach
        @else
            <h1 class="mt-20 text-red">The cart is empty</h1>
        @endif
    </section>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.36/moment-timezone-with-data.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
