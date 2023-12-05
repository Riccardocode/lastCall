
@extends('layout')


@section('content')

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit salesLot
            </h2>
        </header>

    <form action="/products/{{$product_id}}/saleslot/{{$salesLot->id}}" method="post" enctype="multipart/form-data" >
        
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">Sales Lot Description</label>
            <input type="text" value="{{ $salesLot->description }}" class="border border-gray-200 rounded p-2 w-full" name="description" />
            @error('description')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2">Sales Lot Price</label>
            <input type="text" value="{{$salesLot->price}}" class="border border-gray-200 rounded p-2 w-full" name="price" />
            @error('price')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="initial_quantity" class="inline-block text-lg mb-2">Sales Lot Initial Quantity</label>
            <input type="text" value="{{$salesLot->initial_quantity}}" class="border border-gray-200 rounded p-2 w-full" name="initial_quantity" />
            @error('initial_quantity')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="current_quantity" class="inline-block text-lg mb-2">Sales Lot Current Quantity</label>
            <input type="text" value="{{$salesLot->current_quantity}}" class="border border-gray-200 rounded p-2 w-full" name="current_quantity" />
            @error('current_quantity')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for ="discount" class="inline-block text-lg mb-2">Sales Lot Discount</label>
            <input type="number" max=100 min=0 value="{{$salesLot->discount}}" class="border border-gray-200 rounded p-2 w-full" name="discount" />
            @error('discount')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for='start_date' class="inline-block text-lg mb-2">Sales Lot Start Date</label>
            <input type="date" value="{{$salesLot->start_date}}" class="border border-gray-200 rounded p-2 w-full" name="start_date" />
            @error('start_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for='end_date' class="inline-block text-lg mb-2">Sales Lot End Date</label>
            <input type="date" value="{{$salesLot->end_date}}" class="border border-gray-200 rounded p-2 w-full" name="end_date" />
            @error('end_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Update Sales Lot
            </button>

            <a href="/products/$product_id/saleslot" class="text-black ml-4"> Back </a>
        </div>
    </form>

@endsection