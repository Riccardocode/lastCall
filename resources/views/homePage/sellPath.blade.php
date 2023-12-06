{{-- Here place the rooting  --}}

@extends('layout2')

@section('content')

@if(auth()->role=='admin')
@redirect('/business')
@endif
@endsection