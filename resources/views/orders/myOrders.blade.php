@extends('layout2')

@section('content')
    {{-- Hello User name --}}
    <h1 class="text-2xl font-bold text-gray-800 mb-4">Hello {{ $user->firstname }} {{ $user->lastname }}</h1>

    {{-- Order to pickup --}}
    <h2 class="text-xl font-semibold text-gray-700 mb-3">Orders to pickup</h2>
    <div class="list-disc pl-5">
        @if (!count($ordersToPickup) > 0)
            <p class="text-gray-700">You have no orders to pickup</p>
        @else
            @foreach ($ordersToPickup as $order)
                {{-- <?php dd($order); ?> --}}
                <div class="mb-3 bg-white shadow-lg rounded-lg p-4">
                    <p class="font-semibold text-gray-700">Business Name: {{ $order->business->name }}</p>
                    <p>Total Amount Paid: <span class="font-semibold text-green-500">{{ $order->totalAmount }}</span></p>
                    <p>Business Address: {{ $order->business->address }}</p>
                    {{-- QR CODE --}}
                    <p class="mt-2">PickUp Code:
                        <span class="font-semibold text-blue-600">
                            {{ $order->pickupToken }}
                        </span>
                    </p>
                    {{-- Uncomment below for QR code --}}
                    {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate($order->id)) !!} " class="mt-2"> --}}
                </div>
            @endforeach
        @endif
    </div>

    <h2 class="text-xl font-semibold text-gray-700 mb-3">Orders History</h2>
    @if (!count($ordersDelivered) > 0)
        <p class="text-gray-700">You have no orders history</p>
    @else
        <ul class="list-disc pl-5">
            @foreach ($ordersDelivered as $order)
                <li class="mb-3 bg-white shadow-lg rounded-lg p-4">
                    <p class="font-semibold text-gray-700">Business Name: {{ $order->business->name }}</p>
                    <p>Total Amount Paid: <span class="font-semibold text-green-500">{{ $order->totalAmount }}</span></p>
                    <p>Business Address: {{ $order->business->address }}</p>
                    <p>Ordered Date: {{ $order->orderDate }}</p>
                    <p>Pickup Date: {{ $order->pickedupDateTime }}</p>
                </li>
            @endforeach
        </ul>
    @endif
@endsection
