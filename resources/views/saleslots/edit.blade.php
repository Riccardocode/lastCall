@extends('layout2')


@section('content')
    <section class="loginSection">
        <form class="form" action="/products/{{ $product_id }}/saleslot/{{ $salesLot->id }}" method="post"
            enctype="multipart/form-data">

            @csrf
            @method('PUT')
            <h2>
                Edit salesLot
            </h2>
            <input type="text" value="{{ $salesLot->description }}" name="description" />
            @error('description')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ $salesLot->price }}" name="price" />
            @error('price')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ $salesLot->initial_quantity }}" name="initial_quantity" />
            @error('initial_quantity')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ $salesLot->current_quantity }}" name="current_quantity" />
            @error('current_quantity')
                <p>{{ $message }}</p>
            @enderror
            <input type="number" max=100 min=0 value="{{ $salesLot->discount }}" name="discount" />
            @error('discount')
                <p>{{ $message }}</p>
            @enderror
            <input type="date" value="{{ $salesLot->start_date }}" name="start_date" />
            @error('start_date')
                <p>{{ $message }}</p>
            @enderror

            <input type="date" value="{{ $salesLot->end_date }}" name="end_date" />
            @error('end_date')
                <p>{{ $message }}</p>
            @enderror
            <button class="loginBtn">
                Update Sales Lot
            </button>
        </form>
        <div id="register">
            <p>
                <a href="/products/$product_id/saleslot" class="text-laravel"> Back </a>
            </p>
        </div>
    </section>
@endsection
