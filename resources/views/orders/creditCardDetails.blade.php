@extends('layout2')

@section('content')
  
<div style="display: flex; justify-content: center; align-items: center;height:100vh; flex-direction:column ">

<h3>Order id: {{$order_id}}</h3>
<h3>Total Amount: {{$totalAmount}}</h3>
<form style="border:1px solid gray;width:400px" method="POST" action="/orders/cart/payment/confirmation">
    @csrf
    <div class="space-y-4">
        <!-- Card Number -->
        <div>
            <label for="card-cardNumber" class="block text-sm font-medium text-gray-700">Card Number</label>
            <input type="text" id="cardNumber-number" name="cardNumber" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="1234 1234 1234 1234" required>
        </div>

        <!-- Expiry Date -->
        <div class="flex space-x-3">
            <div class="flex-1">
                <label for="expiryMonth" class="block text-sm font-medium text-gray-700">Expiry Month</label>
                <input type="text" id="expiryMonth" name="expiryMonth" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="MM" required>
            </div>
            <div class="flex-1">
                <label for="expiryYear" class="block text-sm font-medium text-gray-700">Expiry Year</label>
                <input type="text" id="expiryYear" name="expiryYear" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="YY" required>
            </div>
        </div>

        <!-- CVV -->
        <div>
            <label for="cardCVC" class="block text-sm font-medium text-gray-700">CVV</label>
            <input type="text" id="cardCVC" name="cardCVC" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="123" required>
        </div>
        <input type="hidden" name="order_id" value="{{ $order_id }}">

        <!-- Submit Button -->
        <div>
            <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Submit Payment</button>
        </div>
    </div>
</form>
</div>
@endsection