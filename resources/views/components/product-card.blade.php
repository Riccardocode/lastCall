@props(['product'])
<?php
$productImg = $product->picture ? asset("storage/$product->picture") : asset('storage/productPictures/generalProduct.png');
?>

<style>
    /* adding random number to the class to make sure it does not clash with some other class */
    #articleBackground{{$product->id}} {
        background-image: url('{{ $productImg }}');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
    }
</style>
<a href="/business/{{ $product->business_id }}">

    <article id="articleBackground{{$product->id}}">
        <div class="reduction">
            <p>50% <br>OFF</p>
        </div>
        <section class="detailsPro">
            <div class="detailsPro1">
                <h4>{{ $product->name }}</h4>
                <p>Star stuff</p>
                <button>Add</button>
            </div>
            <div class="detailsPro2">
                <p>10 min walk</p>
                <p> 6 rue de bonnevoie</p>
            </div>
        </section>
    </article>
</a>
