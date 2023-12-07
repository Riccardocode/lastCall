@extends('layout2')


@section('content')

        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a new salesLot for {{$product_name}}
            </h2>
        </header>

    <form action="/business/{{$business_id}}/products/{{$product_id}}/saleslot" method="post" enctype="multipart/form-data" >
      
        @csrf
        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2">Sales Lot Description</label>
            <input type="text" value="{{ old('description') ? old('description') : '' }}" class="border border-gray-200 rounded p-2 w-full" name="description" />
            @error('description')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="price" class="inline-block text-lg mb-2">Sales Lot Price</label>
            <input type="text" value="{{old('price')? old('price'):''}}" class="border border-gray-200 rounded p-2 w-full" name="price" />
            @error('price')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="initial_quantity" class="inline-block text-lg mb-2">Sales Lot Initial Quantity</label>
            <input type="text" value="{{old('initial_quantity')? old('initial_quantity'):0}}" class="border border-gray-200 rounded p-2 w-full" name="initial_quantity" />
            @error('initial_quantity')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="current_quantity" class="inline-block text-lg mb-2">Sales Lot Current Quantity</label>
            <input type="text" value="{{old('current_quantity')? old('current_quantity'):0}}" class="border border-gray-200 rounded p-2 w-full" name="current_quantity" />
            @error('current_quantity')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for ="discount" class="inline-block text-lg mb-2">Sales Lot Discount</label>
            <input type="number" max=100 min=0 value="{{old('discount')?old('discount'):''}}" class="border border-gray-200 rounded p-2 w-full" name="discount" />
            @error('discount')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for='start_date' class="inline-block text-lg mb-2">Sales Lot Start Date</label>
            <input type="date" value="{{old('start_date')?old('start_date'):''}}" class="border border-gray-200 rounded p-2 w-full" name="start_date" />
            @error('start_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div>
            <label for='end_date' class="inline-block text-lg mb-2">Sales Lot End Date</label>
            <input type="date" value="{{old('end_date') ? old('end_date'):''}}" class="border border-gray-200 rounded p-2 w-full" name="end_date" />
            @error('end_date')
                <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                Create new Sales Lot
            </button>

            <a href="/" class="text-black ml-4"> Back </a>
        </div>
    </form>

@endsection