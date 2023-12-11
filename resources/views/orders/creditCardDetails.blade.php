@extends('layout')

@section('content')
    <section  class="loginSection">

        {{-- <h3>Order id: {{ $order_id }}</h3> --}}
        <form lass="form reveal animationScale" method="POST" action="/orders/cart/payment/confirmation">
            <h2>Total Amount: {{ $totalAmount }}</h2>
            @csrf
                <!-- Card Number -->
                    <input type="text" id="cardNumber-number" name="cardNumber" placeholder="1234 1234 1234 1234" required>
                <!-- Expiry Date -->
                <div class="formFlex">
                        <input type="text" id="expiryMonth" name="expiryMonth" placeholder="MM" required>
                        <input type="text" id="expiryYear" name="expiryYear" placeholder="YY" required>
                        <input type="text" id="cardCVC" name="cardCVC"  placeholder="123" required>
                </div>
                <!-- CVV -->
                <input type="hidden" name="order_id" value="{{ $order_id }}">
                <input type="hidden" name="totalAmount" value="{{ $totalAmount }}">
                <!-- Submit Button -->
                <div  class="btnContainer">
                    <button type="submit" class="loginBtn">Submit Payment</button>
                </div>
        </form>
    </section>
@endsection
