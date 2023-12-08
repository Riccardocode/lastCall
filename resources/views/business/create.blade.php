@extends('layout')


@section('content')
    <section class="loginSection">
        <form class="form" action="/business" method="post" enctype="multipart/form-data">

            @csrf
            <h2>
                Register a new Business
            </h2>
            <input type="file" placeholder=" Business Image" name="businessImg" />
            @error('businessImg')
                <p>{{ $message }}</p>
            @enderror

            <input type="text" value="{{ old('name') ? old('name') : '' }}" placeholder="Business Name" name="name" />
            @error('address')
                <p>{{ $message }}</p>
            @enderror
            <input type="text" value="{{ old('address') ? old('address') : '' }}" placeholder="Business Address"
                name="address" />
            @error('address')
                <p>{{ $message }}</p>
            @enderror
            <select name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>

            @error('businessCategory')
                <p>{{ $message }}</p>
            @enderror
            <button class="loginBtn">
                Create new Business
            </button>
        </form>
        <div id="register">
            <p>
                <a href="/" class="text-laravel"> Back </a>
            </p>
        </div>
    </section>
@endsection
