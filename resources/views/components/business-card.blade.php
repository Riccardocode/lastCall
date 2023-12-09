@props(['business'])
{{-- !to check if it works  --}}
<a href="/business/{{ $business->id }}/products">
    <article>
        <h3>{{ $business->name }} </h3>
        <div>
            {{-- !to fix --}}
            <img src="/storage/businessImages/restaurantGeneral.png" alt="restaurant">
        </div>
    </article>
</a>
