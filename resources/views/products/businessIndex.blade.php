{{-- This file is the view for all the products within a business --}}

@extends('layout')

@section('content')
    <div class="businessClientView">
        <section class="logoAdd reveal animationScale"
            style="background-image: url('/storage/businessImages/restaurantGeneral.png');">
            {{-- manage image in business --}}
            <h1 class="nameRest">{{ $business->name }}</h1>
        </section>
        {{-- products section --}}
        <section class="businessProduts">
            {{-- <?php dd($products[0]); ?> --}}

            @if (auth()->check() && (auth()->user()->id == $business->manager_id || auth()->user()->role == 'admin'))
                <a id="addProd" class="reveal animationShow" href="/business/{{ $business->id }}/products/create">Add product</a>
            @endif

            @if ($business->products->count() == 0)
                <h1>There are no products in this business</h1>
            @else
                <h1 class="reveal animationShow">Products</h1>

                @foreach ($products as $product)
                    <section class="productClientViewS reveal animationUp">
                        <a href="/business/{{ $business->id }}/products/{{ $product->id }}">
                            @if ($product->picture)
                                <img src="/storage/{{ $product->picture }}" alt="image for {{ $product->name }}">
                            @else
                                <img src="/storage/productPictures/generalProduct.png" alt="image for {{ $product->name }}"
                                    class="w-full h-auto rounded-md">
                            @endif
                        </a>
                        <h2>{{ $product->name }}</h2>
                        <div>
                            <h3>{{ $product->category }}</h3>
                            <h4><span>Ingredients</span>: {{ $product->ingredientString }}</h4>
                            <h4><span>Allergies</span>: {{ $product->allergyString }}</h4>
                        </div>
                        {{-- ************************************** Active SalesLot **************************************** --}}
                        {{-- Add the Active Saleslot --}}
                        @if ($product->saleslots->count() > 0)
                            <div>
                                <h4>Active Saleslot</h4>
                                {{-- <h5>Price: {{ $product->saleslots->last()->price }}€</h5> --}}
                                <h5>Quantity: {{ $product->saleslots->last()->current_quantity }}</h5>
                                <h5 class="smallInfo">Start: {{ $product->saleslots->last()->start_date }}</h5>
                                <h5 class="smallInfo">End: {{ $product->saleslots->last()->end_date }}</h5>
                            </div>
                            {{-- add countdown timer for the end of sales --}}
                            <div>

                                <h4>Remaining time</h4>
                                <h4 id="countdown-timer-{{ $product->id }}"></h4>
                                @if (auth()->check() && (auth()->user()->id == $business->manager_id || auth()->user()->role == 'admin'))
                                    <div id="salesManage">

                                        <a
                                            href="/business/{{ $product->business_id }}/products/{{ $product->id }}/saleslot/{{ $product->saleslots[0]->id }}/edit">
                                            <i class="fa-solid fa-pencil"></i></a>
                                        {{-- <a href="">Delete</a> --}}
                                        <a href=""><i class="fa-solid fa-hand"></i></a>
                                    </div>
                                @endif
                            </div>
                            <script>
                                // Iterate through each product with a saleslot and set up a countdown timer
                                @foreach ($products as $product1)
                                    @if ($product1->saleslots->count() > 0)
                                        setupCountdownTimer("{{ $product1->id }}", "{{ $product1->saleslots->last()->end_date }}");
                                    @endif
                                @endforeach

                                function setupCountdownTimer(productId, endDateString) {
                                    let endDate = moment(endDateString);

                                    // Update the countdown timer every second
                                    setInterval(function() {
                                        let now = moment();
                                        let duration = moment.duration(endDate.diff(now));

                                        // Format and display the remaining time
                                        let remainingTime = duration.hours() + "h " + duration.minutes() + "m " + duration.seconds() + "s";
                                        let timerElement = document.getElementById("countdown-timer-" + productId);
                                        timerElement.textContent = remainingTime;

                                        // Hide the timer when the sales slot ends
                                        if (duration.asSeconds() <= 0) {
                                            timerElement.textContent = "Sales slot ended!";
                                        }
                                    }, 1000); // Update every 1 second
                                }
                            </script>
                        @endif
                        {{-- ************************************** End Active SalesLot **************************************** --}}

                        {{-- if manager or Admin --}}
                        @if (auth()->check() && (auth()->user()->id == $business->manager_id || auth()->user()->role == 'admin'))
                            <div>
                                <h5>manage product</h5>
                                {{-- change this with pen icon for edit --}}
                                <div id="manage">
                                    <a href="/business/{{ $business->id }}/products/{{ $product->id }}/edit">
                                        <i class="fa-solid fa-pencil"></i>
                                    </a>

                                    <form action="/business/{{ $business->id }}/products/{{ $product->id }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        {{-- change this with delete Icon --}}
                                        <button type="submit">
                                            {{-- Is style related to a generic form? --}}
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </form>

                                    {{-- Change this with Saleslot Icon --}}
                                    <a href="/business/{{ $business->id }}/products/{{ $product->id }}/saleslot/create">
                                        {{-- new sales lot --}}
                                        <i class="fa-solid fa-tags"></i>
                                    </a>
                                </div>
                            </div>
                            {{-- if user or not logged in --}}
                        @else
                            {{-- if there is a saleslot --}}
                            @if ($product->saleslots->count() > 0)
                                <form id="AddCart" action="/orders" method="POST">
                                    @csrf
                                    <p>
                                        {{ $product->saleslots[0]->price }}  <i class="fa-solid fa-euro-sign"></i>
                                    </p>
                                    <div class="quantity-controls">
                                        {{-- <button type="button" class="quantity-decrease">-</button> --}}
                                        <input style="width:50px;" type="number" name="quantity" class="quantity-input"
                                            value="1" min="1"
                                            max={{ $product->saleslots[0]->current_quantity }}>
                                        {{-- <button type="button" class="quantity-increase">+</button> --}}
                                    </div>
                                    <input type="hidden" name="salesLotId" value="{{ $product->saleslots[0]->id }}">
                                    @if (auth()->check())
                                        <input type="hidden" name="userId" value="{{ auth()->user()->id }}">
                                    @endif
                                    <input type="hidden" name="discountedPrice"
                                        value="{{ $product->saleslots[0]->price - ($product->saleslots[0]->price * $product->saleslots[0]->discount) / 100 }}">
                                    <button type="submit" class="add-to-cart">Add <i
                                            class="fa-solid fa-cart-arrow-down"></i></button>
                                </form>
                            @else
                                <h4 id="emptyProd">Product not available</h4>
                            @endif
                        @endif

                    </section>
                @endforeach
            @endif
        </section>
    </div>


@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment-timezone/0.5.36/moment-timezone-with-data.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
