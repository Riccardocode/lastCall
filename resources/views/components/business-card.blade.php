@props(['business'])
<a href="/business/{{ $business->id }}/products">
    <article>
        <div class="bottom">
            <h3>{{ $business->name }} </h3>
            @if (!empty(session()->get("nearbyBusiness")) && isset(session()->get("nearbyBusiness")[$business->id]))
            
            <p><i class="fa-solid fa-person-walking"></i>  {{ceil(session()->get("nearbyBusiness")[$business->id]["duration"]/60)}} min</p>
            @endif
        </div>
        <div  class="imgBus">
            <img style="height: 100%"  src="/storage/{{$business->businessImg}}" alt="restaurant">
        </div>
    </article>
</a>
