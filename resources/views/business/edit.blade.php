@extends('layout')


@section('content')
    <section class="loginSection">
        <form class="form" action="/business/{{ $id }}" method="post" enctype="multipart/form-data">

            @csrf
            <h2>
                Edit your Business
            </h2>
            @method('PUT')
            @if ($business->businessImg)
                <img class="w-24" src="/storage/{{ $business->businessImg }}" alt="">
            @else
                <img class="w-24" src="/storage/businessImages/restaurantGeneral.png" alt="">
            @endif
            <input type="file" name='businessImg'>
            @error('businessImg')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ $business->name }}" name="name" />
            @error('address')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ $business->address }}" name="address" />
            @error('address')
                <p>{{ $message }}</p>
            @enderror
            <select name="category_id" value="$business->category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $business->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('businessCategory')
                <p>{{ $message }}</p>
            @enderror
            <button class="loginBtn">
                Update Business
            </button>
        </form>
        <div id="register">
            <p>
                <a href="/business/{{ $business->id }}" class="text-laravel"> Back </a>
            </p>
        </div>
    </section>
@endsection
