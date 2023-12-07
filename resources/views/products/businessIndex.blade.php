{{-- This file is the view for all the products within a business --}}

@extends('layout')

@section('content')
    <div class="businessClientView">
        <section class="logoAdd">
            <div class="imgDiv">
                {{-- <img class="logoRest" src="/storage/businessImages/{{ asset('images/generalProfile.png') }}" alt=""> ! restaurant image --}}
                {{-- manage image in business --}}
                <img class="logoRest" src="/storage/businessImages/restaurantGeneral.png" alt=""> {{-- ! restaurant image --}}
                <h1 class="nameRest">{{ $business->name }}</h1>
            </div>
            <div>
                Some Stuff, we have to think about this
            </div>
        </section>

        <section class="businessProduts">
            {{-- <?php dd($products[0]); ?> --}}

            @if (auth()->check() && (auth()->user()->id == $business->manager_id || auth()->user()->role == 'admin'))
                <a href="/business/{{ $business->id }}/products/create">Add product</a>
            @endif

            @if ($business->products->count() == 0)
                <h1>There are no products in this business</h1>
            @else
                <h1>Products</h1>

                @foreach ($products as $product)
                    <section class="productClientViewS">
                        <div>
                            <h2>{{ $product->name }}</h2>
                            <a href="/business/{{ $business->id }}/products/{{ $product->id }}">
                                <img src="/storage/{{ $product->picture }}" alt="image for {{ $product->name }}"
                                    class="w-full h-auto rounded-md">
                            </a>

                        </div>
                        <div>
                            <h3>{{ $product->category }}</h3>
                            <h4>Ingredients: {{ $product->ingredientString }}</h4>
                            <h4>Allergies: {{ $product->allergyString }}</h4>
                        </div>
{{-- ************************************** Active SalesLot **************************************** --}}
                        {{-- Add the Active Saleslot --}}
                        @if ($product->saleslots->count() > 0)
                            <div>
                                <h4>Active Saleslot</h4>
                                <h5>Price: {{ $product->saleslots->last()->price }}€</h5>
                                <h5>Quantity: {{ $product->saleslots->last()->current_quantity }}</h5>
                                <h5>Start: {{ $product->saleslots->last()->start_date }}</h5>
                                <h5>End: {{ $product->saleslots->last()->end_date }}</h5>
                            </div>
                            {{-- add countdown timer for the end of sales --}}
                            <div id="countdown-timer-{{ $product->id }}"></div>
                            <script>
                                // Iterate through each product with a saleslot and set up a countdown timer
                                @foreach ($products as $product)
                                    @if ($product->saleslots->count() > 0)
                                        setupCountdownTimer("{{ $product->id }}", "{{ $product->saleslots->last()->end_date }}");
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
                                        timerElement.textContent = "Time remaining: "+ remainingTime;

                                        // Hide the timer when the sales slot ends
                                        if (duration.asSeconds() <= 0) {
                                            timerElement.textContent = "Sales slot ended!";
                                        }
                                    }, 1000); // Update every 1 second
                                }
                            </script>
                        @endif
{{-- ************************************** End Active SalesLot **************************************** --}}

                        @if (auth()->check() && (auth()->user()->id == $business->manager_id || auth()->user()->role == 'admin'))
                            <div>
                                {{-- change this with pen icon for edit --}}
                                <a href="/business/{{ $business->id }}/products/{{ $product->id }}/edit">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>

                                <form action="/business/{{ $business->id }}/products/{{ $product->id }}" method="POST">
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
                        @else
                            <p>price <i class="fa-solid fa-dollar-sign"></i>
                            </p>{{-- Dear back-end friend fix this :) --}}
                            <button>Add <i class="fa-solid fa-cart-arrow-down"></i></button>
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
