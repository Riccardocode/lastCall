@props(['product'])
{{-- !to check if it works  --}}
<a href="/business/{{$product->business_id}}">
    <article style="background-image: url('{{ asset("storage/$product->picture") }}');">
            <div class="reduction">
                <p>50% <br>OFF</p>
            </div>
            <section class="detailsPro">
                <div class="detailsPro1">
                    <h4>{{$product->name}}</h4>
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