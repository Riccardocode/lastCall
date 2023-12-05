@extends('layout')

{{-- Chossing page --}}
@section('content')
    <h2>Popular Categories</h2>
    {{--! see gigs in the gigs/index.blade.php --}}
    {{-- ! back-end team, it's your time to shine !!! :D fixt this :p --}}
    {{-- @foreach ($business as $busines)
        <x-business-card :busines="$busines"/>
    @endforeach --}}

    @include('partials._searchChoosing')

    <h2>Best Deals Nearby</h2>
    {{--! see gigs in the gigs/index.blade.php --}}
    {{-- ! back-end team, it's your time to shine !!! :D fixt this :p --}}
    {{-- @foreach ($products as $product)
        <x-product-card :product="$product"/>
    @endforeach --}}
@endsection

