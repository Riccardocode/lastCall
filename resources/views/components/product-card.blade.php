@props(['saleslot'])
<?php
$product = $saleslot->product;
$productImg = $saleslot->product->picture ? asset("storage/$product->picture") : asset('storage/productPictures/generalProduct.png');
?>

<style>
    /* adding random number to the class to make sure it does not clash with some other class */
    #articleBackground{{ $saleslot->id }} {
        background-image: url('{{ $productImg }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        border-radius: 5px;
    }
</style> 
<a href="/business/{{ $saleslot->product->business_id }}/products">

    <article id="articleBackground{{$saleslot->id}}">
        <div class="reduction">
            <p>{{$saleslot->discount}}% <br>OFF</p>
        </div>
        <section class="detailsPro">
            <div class="detailsPro1">
                <h4>{{ $saleslot->product->name }}</h4>
                <h3><span style="font-size: 24px;color:green;">€{{$saleslot->price - ($saleslot->price*$saleslot->discount)/100}}<span></h3>
                {{-- <button>Add</button> --}}
            </div>
            <div class="detailsPro2">
                @if (!empty(session()->get("nearbyBusiness")) && isset(session()->get("nearbyBusiness")[$saleslot->product->business_id]))   
                <p><i class="fa-solid fa-person-walking"></i>  {{ceil(session()->get("nearbyBusiness")[$saleslot->product->business_id]["duration"]/60)}} min</p>
                {{-- <p>10 min walk</p>
                <p> 6 rue de bonnevoie</p> --}}
                @endif
            </div>
        </section>
    </article>
</a>
