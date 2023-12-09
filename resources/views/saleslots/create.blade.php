@extends('layout')


@section('content')
    <section class="loginSection">
        <form class="form" action="/business/{{ $business_id }}/products/{{ $product_id }}/saleslot" method="post"
            enctype="multipart/form-data">
            @csrf
            <h2>
                Create a new salesLot for {{ $product_name }}
            </h2>
            <input type="text" value="{{ old('description') ? old('description') : '' }}"
                placeholder="Sales Lot Description" name="description" />
            @error('description')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ old('price') ? old('price') : '' }}" placeholder="Sales Lot Price"
                name="price" />
            @error('price')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ old('initial_quantity') ? old('initial_quantity') :  ''}}"
                placeholder="Quantity" name="initial_quantity" />
            @error('initial_quantity')
                <p>{{ $message }}</p>
            @enderror
            </div>
            {{-- no need to add the current quantity. It will be taken from initial quantity --}}
            {{-- <div class="mb-6">
            <label for="current_quantity" class="inline-block text-lg mb-2">Sales Lot Current Quantity</label>
            <input type="text" value="{{old('current_quantity')? old('current_quantity'):0}}" class="border border-gray-200 rounded p-2 w-full" name="current_quantity" />
            @error('current_quantity')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div> --}}
            <input type="number" max=100 min=0 value="{{ old('discount') ? old('discount') : '' }}"
                placeholder="Sales Lot Discount" name="discount" />
            @error('discount')
                <p>{{ $message }}</p>
            @enderror
            <input type="date" value="{{ old('start_date') ? old('start_date') : '' }}"
                placeholder="Sales Lot Start Date" name="start_date" />
            @error('start_date')
                <p>{{ $message }}</p>
            @enderror

            <input type="date" value="{{ old('end_date') ? old('end_date') : '' }}" placeholder="Sales Lot End Date"
                name="end_date" />
            @error('end_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
            <button class="loginBtn">
                Create new Sales Lot
            </button>
        </form>
        <div id="register">
            <p>

                <a href="/" class="text-laravel"> Back </a>
            </p>
        </div>
    </section>
@endsection
