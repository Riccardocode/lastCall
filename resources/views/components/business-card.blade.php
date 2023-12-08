@props(['business'])
<a href="/business/{{ $business->id }}/products">
    <article>
        <h3>{{ $business->name }} </h3>
        @if (!empty(session()->get("nearbyBusiness")) && isset(session()->get("nearbyBusiness")[$business->id]))
            <p>works</p>
        @endif
        <div>
            <img src="/storage/businessImages/restaurantGeneral.png" alt="restaurant">
        </div>
    </article>
</a>
