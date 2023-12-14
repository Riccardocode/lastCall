@extends('layout')

@section('content')
    {{-- Hello User name --}}
    <section class="sectionOrder">
        <h1 class="reveal animationDown">Hello {{ $user->firstname }} {{ $user->lastname }}</h1>

        {{-- Order to pickup --}}
        <h2 class="reveal animationShow">Orders to pickup</h2>
        @if (!count($ordersToPickup) > 0)
        <article>
            <p>You have no orders to pickup</p>
        </article>
        @else
        @foreach ($ordersToPickup as $order)
        <article class="reveal animationLeft">
                    {{-- <?php dd($order); ?> --}}
                    <div>
                        <p>Business Name: {{ $order->business->name }}</p>
                        <p>Total Amount Paid: <span>{{ $order->totalAmount }} €</span></p>
                        <p>Business Address: {{ $order->business->address }}</p>
                        {{-- QR CODE --}}
                        <p>PickUp Code:
                            <span class="code">
                                {{ $order->pickupToken }}
                            </span>
                        </p>
                        {{-- Uncomment below for QR code --}}
                        {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($order->id)) !!} " class="mt-2"> --}}
                    </div>
                </article>
                @endforeach
            @endif
            
        {{-- Order to pickup --}}
        <h2 class="reveal animationShow">Orders History</h2>
        <article class="reveal animationLeft">
            @if (!count($ordersDelivered) > 0)
                <p>You have no orders history</p>
            @else
                @foreach ($ordersDelivered as $order)
                    <div>
                        <p>Business Name: {{ $order->business->name }}</p>
                        <p>Total Amount Paid: <span>{{ $order->totalAmount }} €</span></p>
                        <p>Business Address: {{ $order->business->address }}</p>
                        <p>Ordered Date: {{ $order->orderDate }}</p>
                        <p>Pickup Date: {{ $order->pickedupDateTime }}</p>
                    </div>
                @endforeach
            @endif
        </article>
    </section>
@endsection
