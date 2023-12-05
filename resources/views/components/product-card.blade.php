@props(['product'])
{{-- !to check if it works  --}}
<a href="/business/{{$products->business_id}}">
    <article>
    {{-- imge as a background  --}}
        <section>
            <h4>{{$products->name}}</h4>
            <p>Star stuff</p>
            <button>Add</button>
            <div>
                <p>10 min walk</p>
                <p> 6 rue de bonnevoie</p>
            </div>
        </section>
    </article>
</a>