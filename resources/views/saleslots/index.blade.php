@extends('layout')

@section('content')
    <h1>Lista de lotes de venta</h1>
   
    <ul>
        @foreach ($saleslots as $salesLot)
            <li>
                <h1>{{$salesLot->description}}</h1>
                <h2>{{$salesLot->price}}</h2>
                <h3>{{$salesLot->initial_quantity}}</h3>
                <h4>{{$salesLot->current_quantity}}</h4>
                <h5>{{$salesLot->discount}}</h5>
                <h6>{{$salesLot->start_date}}</h6>
                <h6>{{$salesLot->end_date}}</h6>
                
                
                
            </li>
        @endforeach
    </ul>

@endsection 