@extends('layout')

@section('content')
    <section class="loginSection">
        @if (!$order_id || !$totalAmount)
            <h3>Ops, looks like there is an issue with the order</h3>
            <h3>Please checkout again from your
                <a href="/orders/cart">cart</a>
            </h3>
        @else
            {{-- <h3>Order id: {{ $order_id }}</h3> --}}
            <form class="form reveal animationScale" method="POST" action="/orders/cart/payment/confirmation">
                @csrf
                @method('post')
                <h2>Total Amount : {{ $totalAmount }} €</h2>
                <!-- Card Number -->
                <div>

                    <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 1234 1234 1234" required>
                    @error('cardNumber')
                        <p style="color: red">Only 16 numbers</p>
                    @enderror
                </div>
                <!-- Expiry Date -->
                <div class="formFlex">
                    <div>
                        <input type="text" id="expiryMonth" name="expiryMonth" placeholder="MM" required>
                        @error('expiryMonth')
                            <p style="color: red">Only number between 1 and 12</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" id="expiryYear" name="expiryYear" placeholder="YYYY" required>
                        @error('expiryYear')
                            <p style="color: red">4 digits</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" id="cardCVC" name="cardCVC" placeholder="123" required>
                        @error('cardCVC')
                            <p style="color: red; margin-top:0;">Only 3 digits</p>
                        @enderror
                    </div>
                </div>
                <!-- CVV -->

                <?php
                if (!$order_id || !$totalAmount) {
                    $totalAmount = session('totalAmount');
                    $order_id = session('order_id');
                }
                ?>

                <input type="hidden" name="order_id" value="{{ $order_id }}">
                <input type="hidden" name="totalAmount" value="{{ $totalAmount }}">


                <!-- Submit Button -->
                <div class="btnContainer">
                    <button type="submit" class="loginBtn">Submit Payment</button>
                </div>
            </form>
        @endif
    </section>
@endsection
